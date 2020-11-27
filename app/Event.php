<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Event extends Model
{
    use Sluggable;

    protected static function booted()
    {
        static::deleting(function ($event) {
            if ($event->flyer) {
                Storage::disk('public')->delete($event->flyer);
            }
        });
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
        'title',
        'description',
        'price',
        'start',
        'end',
        'billetterie',
    ];

    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    public function venues()
    {
        return $this->belongsToMany('App\Venue');
    }

    public function getDisplayDateAttribute()
    {
        $date = ucfirst($this->start->isoFormat('LLLL'));

        if ($this->end) {
            if ($this->start->isSameDay($this->end)) {
                $date = $date . ' - ' . $this->end->format('H:i');
            } else {
                $date = $date . ' - ' . ucfirst($this->end->isoFormat('LLLL'));
            }
        }

        return $date;
    }

    public function getVenuesListAttribute()
    {
        return $this->venues->implode('name', ', ');
    }

    public function getStartFormattedForInputAttribute()
    {
        return Carbon::parse($this->start)->format('Y-m-d\TH:i');
    }

    public function getEndFormattedForInputAttribute()
    {
        if ($this->end) {
            return Carbon::parse($this->end)->format('Y-m-d\TH:i');
        }

        return null;
    }

    public static function eventsAtDate($date, $venueId = null, $shiftInHours = 5)
    {
        $s = $date->copy()->startOfDay()->addHours($shiftInHours);
        $e = $s->copy()->addDay();

        $events = Event::where('start', '>', $s)->where('start', '<=', $e)
            ->when($venueId, function ($query, $venueId) {
                $query->whereHas('venues', function ($query2) use ($venueId) {
                    $query2->where('venues.id', $venueId);
                });
            })
            ->orderBy('start')->orderBy('end')->get();

        foreach ($events as $event) {
            if ($event->end) {
                if ($event->end->isPast()) {
                    $event->finished = true;
                }
            } else {
                if ($event->start->copy()->addDay()->isPast()) {
                    $event->finished = true;
                }
            }
        }

        return $events;
    }

    public static function eventsForThreeDays($queryDate, $venueId = null)
    {
        try {
            $date = Carbon::parse($queryDate);
            $date->setTimeFrom(Carbon::now());
        } catch (\Exception $e) {
            $date = Carbon::now();
        }

        $eventsAtDate = Event::eventsAtDate($date, $venueId);
        $eventsAtDatePlus1 = Event::eventsAtDate($date->copy()->addDays(1), $venueId);
        $eventsAtDatePlus2 = Event::eventsAtDate($date->copy()->addDays(2), $venueId);

        return [
            $date,
            $eventsAtDate,
            $eventsAtDatePlus1,
            $eventsAtDatePlus2,
        ];
    }

    public static function uploadFlyer($request, $event)
    {
        if ($request->file('flyer')) {
            $path = $request->file('flyer')->storeAs(
                'events',
                $event->slug . '-flyer.' . $request->file('flyer')->getClientOriginalExtension(),
                'public',
            );
            $event->flyer = $path;
            $event->save();
        }
    }

    public static function removeFlyer($event)
    {
        if ($event->flyer) {
            Storage::disk('public')->delete($event->flyer);
            $event->flyer = null;
            $event->save();
        }
    }
}

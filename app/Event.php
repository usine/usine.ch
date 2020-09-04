<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Event extends Model
{
    use Sluggable;

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

    public static function eventsAtDate($date, $venueId = null)
    {
        $now = Carbon::now();
        $events =  Event::whereDate('start', $date)
            ->when($venueId, function ($query, $venueId) {
                $query->whereHas('venues', function ($query2) use ($venueId) {
                    $query2->where('venues.id', $venueId);
                });
            })
            ->orderBy('start')->orderBy('end')->get();

        foreach ($events as $event) {
            if ($event->end && $event->end < $now) {
                $event->finished = true;
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
}

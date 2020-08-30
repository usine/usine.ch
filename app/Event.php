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

    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    public function venue()
    {
        return $this->belongsTo('App\Venue');
    }

    public static function eventsAtDate($date, $venueId = null)
    {
        $now = Carbon::now();
        $events =  Event::whereDate('start', $date)
            ->when($venueId, function ($query, $venueId) {
                return $query->where('venue_id', '=', $venueId);
            })
            ->orderBy('start')->orderBy('end')->get();

        foreach ($events as $event) {
            if ($event->end < $now) {
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

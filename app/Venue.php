<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Venue extends Model
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
                'source' => 'name'
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

    public function events()
    {
        return $this->hasMany('App\Event');
    }

    public function eventsToCome()
    {
        return $this->hasMany('App\Event')->whereDate('start', '>=', Carbon::today())->orderBy('start')->orderBy('end');
    }

    public function eventsPast()
    {
        return $this->hasMany('App\Event')->whereDate('end', '<', Carbon::today())->orderBy('start', 'desc')->orderBy('end', 'desc');
    }
}

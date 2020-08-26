<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    public function venue()
    {
        return $this->belongsTo('App\Venue');
    }
}

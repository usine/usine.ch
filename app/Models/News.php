<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class News extends Model
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
        'publication_date',
        'title',
        'body',
    ];

    protected $casts = [
        'publication_date' => 'datetime',
    ];

    public function scopePublished($query)
    {
        return $query->where('publication_date', '<=', now());
    }

    public function getPublicationDateFormattedForInputAttribute()
    {
        return Carbon::parse($this->publication_date)->format('Y-m-d\TH:i');
    }
}

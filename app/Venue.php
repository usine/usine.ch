<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Venue extends Model
{
    use Sluggable;

    protected static function booted()
    {
        static::deleting(function ($venue) {
            if ($venue->logo) {
                Storage::disk('public')->delete($venue->logo);
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

    protected $fillable = [
        'name',
        'description',
        'access',
        'tel',
        'email',
        'website',
    ];

    public function events()
    {
        return $this->belongsToMany('App\Event');
    }

    public static function uploadLogo($request, $venue)
    {
        if ($request->file('logo')) {
            $path = $request->file('logo')->storeAs(
                'espaces',
                $venue->slug . '-logo.' . $request->file('logo')->getClientOriginalExtension(),
                'public',
            );
            $venue->logo = $path;
            $venue->save();
        }
    }

    public static function removeLogo($venue)
    {
        if ($venue->logo) {
            Storage::disk('public')->delete($venue->logo);
            $venue->logo = null;
            $venue->save();
        }
    }
}

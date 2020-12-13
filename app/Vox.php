<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

use Cviebrock\EloquentSluggable\Sluggable;

class Vox extends Model
{
    use Sluggable;

    protected static function booted()
    {
        static::deleting(function ($vox) {
            if ($vox->thumbnail) {
                Storage::disk('public')->delete($vox->thumbnail);
            }
            if ($vox->vox) {
                Storage::disk('public')->delete($vox->vox);
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
        'date',
        'thumbnail',
        'vox',
    ];

    protected $appends = [
        'year',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function getYearAttribute()
    {
        return $this->date->year;
    }

    public static function uploadMiniature($request, $vox)
    {
        if ($request->file('thumbnail')) {
            $path = $request->file('thumbnail')->storeAs(
                'voxusini',
                'vox-' . $vox->date->year . '-' . $vox->date->month . '-' . $vox->slug . '-thumbnail' . $request->file('thumbnail')->getClientOriginalExtension(),
                'public',
            );
            $vox->thumbnail = $path;
            $vox->save();
        }
    }

    public static function uploadVox($request, $vox)
    {
        if ($request->file('vox')) {
            $path = $request->file('vox')->storeAs(
                'voxusini',
                'vox-' . $vox->date->year . '-' . $vox->date->month . '-' . $vox->slug . $request->file('vox')->getClientOriginalExtension(),
                'public',
            );
            $vox->vox = $path;
            $vox->save();
        }
    }

    public function getThumbnail600Attribute()
    {
        return '/img/cache/vox600/' . $this->thumbnail;
    }
}

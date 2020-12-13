<?php

namespace App\Image\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Flyer932 implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->resize(932, null, function ($constraint) {
            $constraint->aspectRatio();
        });
    }
}

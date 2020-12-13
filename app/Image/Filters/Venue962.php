<?php

namespace App\Image\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Venue962 implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->resize(962, null, function ($constraint) {
            $constraint->aspectRatio();
        });
    }
}

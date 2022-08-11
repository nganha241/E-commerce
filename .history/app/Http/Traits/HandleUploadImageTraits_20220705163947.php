<?php
namespace App\Traits;

use Intervention\Image\Image;

trait HandleImageTrait
{
    public function veryfy($request) {
        return $request->has('image');
    }
}
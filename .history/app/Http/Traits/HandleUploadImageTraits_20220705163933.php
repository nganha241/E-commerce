<?php
namespace App\Traits;

use Intervention\Image\Image;

traits HandleImageTraits
{
    public function veryfy($request) {
        return $request->has('image');
    }
}

?>
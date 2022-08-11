<?php

namespace App\Traits;

use Intervention\Image\Image;

trait HandleImageTrait
{
    protected $path = 'upload/users';
    public function veryfy($request)
    {
        return $request->has('image');
    }

    public function saveImage($request)
    {
        if($this->veryfy($request)) {
            $name = time().'.'.$image->getCli
        }
    }

    public function updateImage($request, $currentImage)
    {
        if ($this->veryfy($request)) {
            $this->deleteImage($currentImage);
            return $this->saveImage($request);
        }
        return $currentImage;
    }

    public function deleteImage($imageName)
    {
        if (file_exists($this->path . $imageName)) {
            unlink($this->path . $imageName);
        }
    }
}
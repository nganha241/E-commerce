<?php

namespace App\Traits;

// use Intervention\Image\Image;
use Intervention\Image\ImageManagerStatic as Image;

trait HandleUploadImageTraits
{
    protected $path = 'upload/imgs/';
    public function veryfy($request)
    {

        return $request->has('image');
    }

    public function saveImage($request)
    {
        $image = $request->file('image');

        if ($this->veryfy($request)) {
            $name = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save($this->path . $name);
            return $name;
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
        if ($imageName && file_exists($this->path . $imageName)) {
            unlink($this->path . $imageName);
        }
    }
}

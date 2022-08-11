<?php

namespace App\Models;

use App\Traits\HandleUploadImageTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HandleUploadImageTraits;

    protected $fillable = [
        'name', 'description', 'sale', 'price'
    ];

    public function details()
    {
        return $this->hasMany(Product::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
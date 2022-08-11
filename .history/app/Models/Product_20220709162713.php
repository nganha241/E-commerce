<?php

namespace App\Models;

use App\Traits\HandleUploadImageTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HandleUploadImageTraits;

    protected $fillable = [
        'name', 'description', 'sale', 'price', 'size'
    ];

    public function details()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function sale($price, $sale)
    {
        return number_format(round($price - (($sale * $price) / 100), 3), 0, ',', ', ');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'id', 'id');
    }
}
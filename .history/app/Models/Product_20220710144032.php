<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Traits\HandleUploadImageTraits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function price()
    {
        return number_format($this->price, 0, ',', ', ');
    }

    public function sale()
    {
        return number_format(round($this->price - (($this->sale * $this->price) / 100), 3), 0, ',', ', ');
    }

    public function name()
    {
        return Str::limit($this->name, 40);
    }

    public function getBy($dataSearch, $categoryId)
    {
        return $this->whereHas('categories', fn ($q) => $q->where('category_id', $categoryId))->get();
        // return $this->whereHas('categories', fn ($q) => $q->where('category_id', $categoryId))->get();
    }
}
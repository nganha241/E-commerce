<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function childrens()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function getParentNameAttribute()
    {
        return optional($this->parent)->name;
    }

    public function getParents()
    {
        return Category::get(['id', 'name']);
    }

    public function Products()
    {
        return $this->hasMany(Product::class, 'id');
    }

    public function getBy($dataSearch, $productId)
    {
        return $this->whereHas('products', fn ($q) => $q->where('product_id', $productId))->get();
    }
}

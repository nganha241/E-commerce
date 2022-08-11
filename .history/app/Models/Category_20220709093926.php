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

    public static function tree()
    {
        return static::with(implode('.', array_fill(0, 100, 'children')))
            ->where('parent_id', '=', '0')->orderBy('sort_order')->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    public function products()
    {
        return $this->hasMany(CartProduct::class, 'cart_id');
    }

    public function getById($userId)
    {
        return User::whereUserId($userId)->first();
    }
}
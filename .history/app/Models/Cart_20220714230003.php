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
        return Cart::whereUserId($userId)->first();
    }

    public function firstOrCreateBy($userId)
    {
        $cart = $this->getById($userId);

        if (!$cart) {
            $cart = Cart::create(['user_id' => $userId]);
        }
        return $cart;
    }

    public function count()
    {
        if (auth()->check()) {
            $cart =  Cart::getById(auth()->user()->id);

            return $cart ? $cart->products->count() : 0;
        }

        return 0;
    }
}
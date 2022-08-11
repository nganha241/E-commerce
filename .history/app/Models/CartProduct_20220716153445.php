<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_size',
        'product_quantity',
        'product_price',
        'cart_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function getById($cartId, $productId)
    {
        return CartProduct::whereCartId($cartId)->whereProductId($productId)->first();
    }
    public function total()
    {
        return number_format(round($this->product_quantity * ($this->product->price - (($this->product->sale * $this->product->price) / 100)), 3), 0, ',', ', ');
    }
}
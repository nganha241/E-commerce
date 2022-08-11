<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'product_quantity',
        'product_price',
    ];

    public function Products()
    {
        return $this->hasMany(Product::class, 'id');
    }
}
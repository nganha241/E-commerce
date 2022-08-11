<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'note',
        'total',
        'user_id',
    ];

    public function total()
    {
        return number_format($this->total, 0, ',', ',');
    }

    public function ProductOrder()
    {
        return HasMany
    }
}
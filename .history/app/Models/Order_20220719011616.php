<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'total',
        'ship',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'note',
        'user_id',
        'product'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Article', 'article_tag', 'article_id', 'tag_id');
    }
}
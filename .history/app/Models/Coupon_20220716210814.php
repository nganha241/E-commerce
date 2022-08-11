<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type', 'value', 'expiry_date',
    ];

    public function getExpriryDateAttribute()
    {
        return Carbon::parse($this->attributes['expiry_date'])->format('Y-m-d');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'coupon_user');
    }

    public function firstWithExpiryDate($name, $userId)
    {
        return $this->whereName($name)->whereDoesntHave('users', fn($q)=>$q->where('user.id'))
    }
}
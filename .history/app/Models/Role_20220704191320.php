<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name',
        'group'
    ];

    protected function guarName(): Attribute {
        return Attribute::make(
            get:
        )
    }
}
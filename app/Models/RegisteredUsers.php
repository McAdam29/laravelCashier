<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisteredUsers extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'username',
        'password',
        'created_on',
        'updated_on',
        'status',
        'is_deleted',
    ];

    /**
     * Purchase Model
     */
    public function purchase()
    {
        return $this->hasMany(Purchase::class);
    }

    /**
     * Purchase Model
     */
    public function products()
    {
        return $this->hasMany(Products::class);
    }
}

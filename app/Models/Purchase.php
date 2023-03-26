<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $table = 'purchase';

    protected $fillable = [
        'fk_customer_id',
        'fk_product_id',
        'total_amount',
        'paid_amount',
        'is_due',
        'purchased_on',
        'updated_on',
        'status',
        'is_deleted',
    ];
     /**
     * Purchase Model
     */
    public function registeredUsers()
    {
        return $this->belongsTo(RegisteredUsers::class);
    }

    /**
     * Purchase Model
     */
    public function products()
    {
        return $this->hasMany(Products::class);
    }
}

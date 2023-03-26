<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPurchase extends Model
{
    use HasFactory;

     protected $fillable = [
        'fk_users_id',
        'fk_customers_id',
        'plan_name',
        'plan_type',
        'price',
        'remarks',
    ];
}

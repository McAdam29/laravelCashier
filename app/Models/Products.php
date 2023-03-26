<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_description',
        'is_expired',
        'is_deleted',
        'created_on',
        'updated_on',
    ];

     /**
     * Purchase Model
     */
    public function purchase()
    {
        return $this->hasMany(Purchase::class);
    }
}

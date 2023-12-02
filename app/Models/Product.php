<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Product.php
    public function orders()
    {
        return $this->hasMany(Order::class, 'id_product', 'id');
    }

}

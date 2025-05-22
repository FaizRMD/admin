<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['code', 'name', 'price', 'stock'];

    public function penjualans()
    {
        return $this->hasMany(Penjualan::class);
    }

    
}


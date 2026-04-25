<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // menambahkan baris sakti ini bolo!
    protected $fillable = ['name'];

    // Relasi ke produk 
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
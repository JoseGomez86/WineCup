<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receptiongood extends Model
{
    use HasFactory;

    //Relación muchos a muchos con Products
    public function products()
    {
        //return $this->belongsToMany(Product::class, 'product_receptionsgood')->withPivot('expiration_dates', 'quantity')->withTimestamps();
        return $this->belongsToMany(Product::class)->withPivot('expiration_dates', 'quantity')->withTimestamps();
    }

    //Relación uno a muchos inversa con Supplier
    public function supplier()
    {
        return $this->belongsTo(Suppliers::class);
    }
}

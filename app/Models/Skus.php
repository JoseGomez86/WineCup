<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skus extends Model
{
    use HasFactory;

    //Relación uno a muchos inversa con Product
    public function product(){
        return $this->belongsTo(Product::class);
    }

    //Relación uno a muchos con receptiongoods
    public function receptiongoods(){
        return $this->hasMany(Receptiongoods::class);
    }
}

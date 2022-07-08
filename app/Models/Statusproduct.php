<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statusproduct extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    //Relación uno a muchos con Products
    public function products(){
        return $this->hasMany(Product::class);
    }
}

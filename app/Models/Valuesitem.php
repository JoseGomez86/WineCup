<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valuesitem extends Model
{
    use HasFactory;

    protected $fillable=['name','item_id'];

    //Relación uno a muchos inversa con Items
    public function item(){
        return $this->belongsTo(Item::class);
    }

    //Relación muchos a muchos con Products
    public function products(){
        return $this->belongsToMany(Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    const Baja=1;
    const Alta=2;
    
    protected $guarded=['id','created_at','updated_at'];
    
    //Relación uno a muchos inversa con Categories
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //Relación uno a muchos con Items
    public function items(){
        return $this->hasMany(Item::class);
    }

    //Relacion uno a muchos con valuesItems a través de Items
    public function valuesItems(){
        return $this->hasManyThrough(Valuesitem::class, Item::class);
    }

    //Relación uno a muchos con Products
    public function products(){
        return $this->hasMany(Product::class);
    }

    //Url amigables
    public function getRouteKeyName()
    {
        return 'slug';
    }

}

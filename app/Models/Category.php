<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    const Baja=1;
    const Alta=2;

    protected $fillable=['name','slug','image','icon'];
    //Relación uno a muchos con Subcategories
    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }

    //Relacion uno a muchos con Products a través de Subcategories
    public function products(){
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }

    //Url amigables
    public function getRouteKeyName()
    {
        return 'slug';
    }
}

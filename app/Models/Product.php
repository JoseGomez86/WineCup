<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded=['id','created_at','updated_at'];

    //Relación muchos a muchos con ValuesItems
    public function valuesitems(){
        return $this->belongsToMany(Valuesitem::class)->withTimestamps();
    }

    //Relación uno a muchos inversa con Subcategory
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    //Relación uno a muchos inversa con Statusproduct
    public function statusproduct(){
        return $this->belongsTo(Statusproduct::class);
    }

    //Relación uno a muchos polimorfica con image
    public function images(){
        return $this->morphMany(Image::class,"imageable");
    }

    //Relación muchos a muchos con receptiongoods
    public function receptiongoods(){
        //return $this->belongsToMany(Receptiongood::class, 'product_receptionsgood')->withPivot('expiration_dates', 'quantity')->withTimestamps();
        return $this->belongsToMany(Receptiongood::class)->withPivot('expiration_dates', 'quantity')->withTimestamps();
    }

    //Url amigables
    public function getRouteKeyName()
    {
        return 'slug';
    }
}

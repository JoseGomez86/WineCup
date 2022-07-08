<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    //Relación uno a muchos Valuesitem
    public function valuesitems(){
        return $this->hasMany(Valuesitem::class);
    }

    //Relación uno a muchos inversa con SubCategories
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
}

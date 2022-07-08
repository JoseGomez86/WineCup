<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    //Relación uno a muchos inversa con district
    public function district(){
        return $this->belongsTo(District::class);
    }

    //Relación uno a muchos con Addresses
    public function addresses(){
        return $this->hasMany(Address::class);
    }

    //Relación uno a muchos con Postcodes
    public function postcodes(){
        return $this->hasMany(Postcode::class);
    }

}

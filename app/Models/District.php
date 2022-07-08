<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    //Relación uno a muchos inversa con Province
    public function province(){
        return $this->belongsTo(Province::class);
    }

    //Relación uno a muchos con Localities
    public function localities(){
        return $this->hasMany(Locality::class);
    }

    //Relación uno a muchos con Addresses
    public function addresses(){
        return $this->hasMany(Address::class);
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postcode extends Model
{
    use HasFactory;

    protected $fillable=['Postcode','zone_id'];

    //Relación uno a muchos con Addresses
    public function addresses(){
        return $this->hasMany(Address::class);
    }

    //Relación uno a muchos inversa con zone
    public function zone(){
        return $this->belongsTo(Zone::class);
    }

    //Relación uno a muchos inversa con Locality
    public function locality(){
        return $this->belongsTo(Locality::class);
    }
}

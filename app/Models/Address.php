<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $guarded=['id','created_at','updated_at'];

    //Relación uno a muchos inversa con Province
    public function province(){
        return $this->belongsTo(Province::class);
    }

    //Relación uno a muchos inversa con district
    public function district(){
        return $this->belongsTo(District::class);
    }

    //Relación uno a muchos inversa con locality
    public function locality(){
        return $this->belongsTo(Locality::class);
    }

    //Relación uno a muchos inversa con user
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relación uno a muchos inversa con postcode
    public function postcode(){
        return $this->belongsTo(Postcode::class);
    }
}

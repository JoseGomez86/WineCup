<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $guarded=['id','created_at','updated_at'];

    //Relación uno a muchos con Postcodes
    public function postcodes(){
        return $this->hasMany(Postcode::class);
    }
}

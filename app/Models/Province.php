<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    //Relación uno a muchos con Districts
    public function districts(){
        return $this->hasMany(District::class);
    }

    //Relación uno a muchos con Addresses
    public function addresses(){
        return $this->hasMany(Address::class);
    }
}

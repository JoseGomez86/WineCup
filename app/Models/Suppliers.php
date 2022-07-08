<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;

    //Relación uno a muchos con receptiongoods
    public function receptiongoods(){
        return $this->hasMany(Receptiongoods::class);
    }
}

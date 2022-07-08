<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded=['id','created_at','updated_at'];

    //Relación muchos a muchos con Statuses
    public function statuses(){
        return $this->belongsToMany(Status::class)
            ->as('statuses')
            ->withTimestamps();
    }
}

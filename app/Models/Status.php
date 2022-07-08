<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    //Relación muchos a muchos con Orders
    public function orders(){
        return $this->belongsToMany(Order::class)->withTimestamps();
    }
}

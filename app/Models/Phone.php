<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable=['numberPhone'];

    //Relación muchos a muchos con Users
    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}

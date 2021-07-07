<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{

    protected $table='sections';
    
    public function student(){
        return $this->hasMany(App\AddStudent::class);
        }

    public function class(){
        return $this->belongsTo(App\Classes::class);
        }
}


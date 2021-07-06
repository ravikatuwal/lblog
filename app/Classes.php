<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    public function class(){

        return $this->hasMany(App\AddStudent::class);
    }
    
    public function section(){

        return $this->hasMany(App\Sections::class);
    }
}


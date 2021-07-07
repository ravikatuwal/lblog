<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    public function student(){

        return $this->hasMany(App\AddStudent::class);
    }
    protected $guarded = [];
    public function section(){

        return $this->hasMany(App\Classes::class, 'class_id');
    }
}


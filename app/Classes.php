<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;
use App\Sections;

class Classes extends Model
{
    public function students(){

        return $this->hasMany(Student::class, 'class_id','id');
    }
    protected $guarded = [];
    public function sections(){

        return $this->hasMany(Sections::class, 'class_id','id');
    }
}


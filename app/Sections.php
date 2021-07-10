<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Classes;
use App\Student;

class Sections extends Model
{

    protected $table='sections';
    
    public function students(){
        return $this->hasMany(Student::class,'section_id','id');
        }

    public function classes(){
        return $this->belongsTo(Classes::class,'class_id', 'id');
        }
}


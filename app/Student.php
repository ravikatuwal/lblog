<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Classes;
use App\Sections;

class Student extends Model
{
    public function classes(){
        return $this->belongsTo(Classes::class,'class_id','id');
        }


    public function sections(){
        return $this->belongsTo(Sections::class,'section_id','id');
        }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    public function student(){
        return $this->belongsTo(App\Classes::Student, 'section');
        }
}


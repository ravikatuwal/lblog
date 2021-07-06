<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddStudent extends Model
{
    public function class(){
        return $this->belongsTo(App\Classes::class);
    }

    public function section(){
        return $this->belongsTo(App\Sections::class);
    }
}

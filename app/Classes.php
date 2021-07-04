<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    public function classes(){

        return $this->hasMany(App\Sections::class, 'section_id');
              }
}


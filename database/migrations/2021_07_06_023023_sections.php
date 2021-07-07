<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('sections')){
            Schema::create('sections', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('section_class');
                $table->foreign('section_class')->references('class_id')->on('classes');
                $table->string('section_id');
                $table->string('section_name');
                $table->timestamps();
    
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

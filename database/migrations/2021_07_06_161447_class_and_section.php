<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClassAndSection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('classesandsection')){
            Schema::create('classesandsection', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name_class')->references('class_name')->on('classes');
                $table->string('name_section')->references('section_name')->on('sections');
                $table->timestamps();
            });
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

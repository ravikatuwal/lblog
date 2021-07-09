<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('students')){
            Schema::create('students', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('first_name');
                $table->string('last_name');
                $table->string('student_class');
               
                $table->string('student_section');
                
                $table->string('email');
                $table->string('phone');
                $table->timestamps();
                $table->foreign('student_class')->references('class_id')->on('classes')->onDelete('cascade');
                $table->foreign('student_section')->references('section_id')->on('sections')->onDelete('cascade');

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
        Schema::dropIfExists('students');
    }
}

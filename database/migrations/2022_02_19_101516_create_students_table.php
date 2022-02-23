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
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('gender_id')->unsigned();
            $table->integer('nationality_id')->unsigned();
            $table->integer('blood_id')->unsigned();
            $table->date('birthdate');
            $table->integer('grade_id')->unsigned();
            $table->integer('classroom_id')->unsigned();
            $table->integer('section_id')->unsigned();
            $table->integer('parent_id')->unsigned();
            $table->string('academic_year');
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('nationality_id')->references('id')->on('nationalities');
            $table->foreign('blood_id')->references('id')->on('blood_types');
            $table->foreign('grade_id')->references('id')->on('grades');
            $table->foreign('section_id')->references('id')->on('sections');
            $table->foreign('parent_id')->references('id')->on('parents');
            $table->foreign('classroom_id')->references('id')->on('class_rooms');
            $table->softDeletes();
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
        Schema::dropIfExists('students');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('father_name');
            $table->string('father_id');
            $table->string('father_passport');
            $table->string('father_phone');
            $table->string('father_job');
            $table->string('father_address');
            $table->integer('father_nationality_id')->unsigned();
            $table->integer('father_bloodType_id')->unsigned();
            $table->integer('father_religion_id')->unsigned();

            $table->string('mother_name');
            $table->string('mother_id');
            $table->string('mother_passport');
            $table->string('mother_phone');
            $table->string('mother_job');
            $table->string('mother_address');
            $table->integer('mother_nationality_id')->unsigned();
            $table->integer('mother_bloodType_id')->unsigned();
            $table->integer('mother_religion_id')->unsigned();

            $table->foreign('father_nationality_id')->references('id')->on('nationalities');
            $table->foreign('father_bloodType_id')->references('id')->on('blood_types');
            $table->foreign('father_religion_id')->references('id')->on('religions');

            $table->foreign('mother_nationality_id')->references('id')->on('nationalities');
            $table->foreign('mother_bloodType_id')->references('id')->on('blood_types');
            $table->foreign('mother_religion_id')->references('id')->on('religions');


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
        Schema::dropIfExists('parents');
    }
}

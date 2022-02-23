<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();

            $table->integer('from_grade')->unsigned();
            $table->integer('from_classroom')->unsigned();
            $table->integer('from_section')->unsigned();

            $table->integer('to_grade')->unsigned();
            $table->integer('to_classroom')->unsigned();
            $table->integer('to_section')->unsigned();
            $table->string('academic_year');
            $table->string('academic_year_new');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('from_grade')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('to_grade')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('from_classroom')->references('id')->on('class_rooms')->onDelete('cascade');
            $table->foreign('to_classroom')->references('id')->on('class_rooms')->onDelete('cascade');
            $table->foreign('from_section')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('to_section')->references('id')->on('sections')->onDelete('cascade');
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
        Schema::dropIfExists('promotions');
    }
}

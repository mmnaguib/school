<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('amount');
            $table->integer('grade_id')->unsigned();
            $table->integer('classroom_id')->unsigned();
            $table->string('academic_year');
            $table->integer('fee_type');
            $table->text('notes');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('classroom_id')->references('id')->on('class_rooms')->onDelete('cascade');

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
        Schema::dropIfExists('fees');
    }
}

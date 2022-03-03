<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->date('invoice_date');
            $table->integer('student_id')->unsigned();
            $table->integer('grade_id')->unsigned();
            $table->integer('classroom_id')->unsigned();
            $table->integer('fee_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('grade_id')->references('id')->on('grades');
            $table->foreign('classroom_id')->references('id')->on('class_rooms');
            $table->foreign('fee_id')->references('id')->on('fees');
            $table->decimal('amount',8 ,2);
            $table->text('description')->nullable();
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
        Schema::dropIfExists('fee_invoices');
    }
}

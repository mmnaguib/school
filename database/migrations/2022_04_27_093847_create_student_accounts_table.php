<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->integer('fee_invoice_id')->unsigned()->nullable();
            $table->integer('payment_id')->unsigned()->nullable();
            $table->integer('receipe_id')->unsigned()->nullable();
            $table->integer('process_id')->unsigned()->nullable();
            $table->date('date');
            $table->string('type');
            $table->foreign('fee_invoice_id')->nullable()->references('id')->on('fee_invoices')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('payment_id')->references('id')->on('payment_students')->onDelete('cascade');
            $table->foreign('receipe_id')->references('id')->on('receipe_students')->onDelete('cascade');
            $table->foreign('process_id')->references('id')->on('process_fees')->onDelete('cascade');
            $table->decimal('debit',8 ,2)->nullable();
            $table->decimal('credit',8 ,2)->nullable();
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
        Schema::dropIfExists('student_accounts');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fund_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('receipe_id')->unsigned()->nullable();
            $table->foreign('receipe_id')->references('id')->on('receipe_students')->onDelete('cascade');
            $table->integer('payment_id')->unsigned()->nullable();
            $table->foreign('payment_id')->references('id')->on('payment_students')->onDelete('cascade');
            $table->decimal('debit',8 ,2)->nullable();
            $table->decimal('credit',8 ,2)->nullable();
            $table->text('description');
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
        Schema::dropIfExists('fund_accounts');
    }
}

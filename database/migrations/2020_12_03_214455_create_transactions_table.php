<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            //cutomer id
            $table->integer('customerId')->unsigned();
            $table->foreign('customerId')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            //product id
            $table->integer('productId')->unsigned();
            $table->foreign('productId')
            ->references('id')
            ->on('products')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            //purchase amount
            $table->integer('purchaseAmount');
            $table->char('status', 20);
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
        Schema::dropIfExists('transactions');
    }
}

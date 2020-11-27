<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->char('first_name', 100);
            $table->char('last_name', 100);
            $table->text('home_address' );
            $table->char('contact_number', 15);
            $table->char('postal', 100);
            $table->string('email');
            $table->char('status', 50);
            $table->char('payment_method', 50);
            $table->integer('product_price');
            $table->integer('customerId')->unsigned();
            $table->foreign('customerId')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('productId')->unsigned();
            $table->foreign('productId')
            ->references('id')
            ->on('products')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('customer_orders');
    }
}

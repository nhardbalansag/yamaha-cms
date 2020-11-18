<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id('id');
            $table->char('first_name', 100);
            $table->char('last_name', 100);
            $table->char('middle_name', 100);
            $table->char('email_address', 100);
            $table->text('home_address' );
            $table->text('street_address');
            $table->char('country_region', 100);
            $table->char('contact_number', 15);
            $table->char('city', 100);
            $table->char('state_province', 100);
            $table->char('postal', 100);
            $table->integer('productId')->unsigned();
            $table->foreign('productId')->unsigned()
            ->references('id')->on('products')
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
        Schema::dropIfExists('inquiries');
    }
}

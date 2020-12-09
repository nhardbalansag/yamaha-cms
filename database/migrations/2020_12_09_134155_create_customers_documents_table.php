<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('photo_path');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('document_id')->unsigned();
            $table->foreign('document_id')
            ->references('id')
            ->on('document_categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('status');
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
        Schema::dropIfExists('customers_documents');
    }
}

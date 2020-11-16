<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_specifications', function (Blueprint $table) {
            $table->increments('id');
            $table->char('title', 100);
            $table->string('description');
            $table->char('status', 50);
            $table->integer('update_count')->nullable();
            $table->integer('specification_category_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->foreign('specification_category_id')
                ->references('id')->on('specification_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('product_id')
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
        Schema::dropIfExists('product_specifications');
    }
}

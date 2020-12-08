<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->text('photo_path')->nullable();
            $table->char('title', 100);
            $table->string('description', 500);
            $table->char('status', 50);
            $table->integer('update_count')->nullable();
            $table->integer('price');
            $table->integer('product_category_id')->unsigned();
            // $table->integer('specification_id')->unsigned();
            // $table->integer('colors_type_id')->unsigned();
            $table->foreign('product_category_id')
                ->references('id')
                ->on('product_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            // $table->foreign('specification_id')
            //     ->references('id')
            //     ->on('specifications')
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade');
            // $table->foreign('colors_type_id')
            //     ->references('id')
            //     ->on('color_types')
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade');
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
        Schema::dropIfExists('products');
    }
}

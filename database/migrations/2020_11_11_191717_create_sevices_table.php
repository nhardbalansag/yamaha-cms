<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sevices', function (Blueprint $table) {
            $table->increments('id');
            $table->text('photo_path')->nullable();
            $table->char('title', 100);
            $table->string('description');
            $table->char('status', 50);
            $table->integer('update_count')->nullable();
            $table->integer('price');
            $table->integer('service_categories_id')->unsigned();
            $table->foreign('service_categories_id')
                ->references('id')
                ->on('service_categories')
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
        Schema::dropIfExists('sevices');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEndUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('end_users', function (Blueprint $table) {
            $table->id();
            $table->char('first_name', 100);
            $table->char('last_name', 100);
            $table->char('middle_name', 100);
            $table->text('home_address' );
            $table->text('street_address');
            $table->char('country_region', 100);
            $table->char('contact_number', 15);
            $table->char('city', 100);
            $table->char('state_province', 100);
            $table->char('postal', 100);
            $table->char('account_type', 50);
            $table->char('status', 50);
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('end_users');
    }
}

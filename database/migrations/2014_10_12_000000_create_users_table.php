<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
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
            // $table->char('account_type', 50);
            $table->char('role', 50);
            $table->boolean('verified');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
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
        Schema::dropIfExists('users');
    }
}

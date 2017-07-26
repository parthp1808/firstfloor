<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('avatar')->default('img/profile/default.jpg');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('status')->default('Active');
            $table->string('user_type')->default('User');
            $table->string('postal_code')->nullable();
            $table->string('photo')->nullable();
            $table->string('number')->default('2222222222');
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

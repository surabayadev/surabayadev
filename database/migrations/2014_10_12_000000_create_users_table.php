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
            $table->unsignedInteger('role_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('api_token', 80)->unique()->nullable()->default(null);
            $table->boolean('is_active')->default(0);
            $table->boolean('is_subscribe')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->string('gender', 1)->default('m');
            $table->string('job')->nullable();
            $table->string('company')->nullable();
            $table->string('province')->index()->nullable();
            $table->string('city')->index()->nullable();
            $table->string('address')->index()->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('github')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('instagram_token')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('telegram')->nullable();
            $table->dateTime('last_login_at')->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles');
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

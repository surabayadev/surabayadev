<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('cover')->nullable();
            $table->string('city');
            $table->text('address');
            $table->text('description');
            $table->text('content')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->bigInteger('participant_limit')->default(0);
            $table->string('ig_hashtag')->nullable();
            $table->string('ig_hashtag_status', 100)->nullable()->default('idle');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_participants', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_event')->references('id')
                                ->on('events')->onUpdate('cascade')->onDelete('cascade');
            $table->string('email')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('notelp')->nullable();
            $table->string('status')->nullable();
            $table->string('asal_institusi')->nullable();
            $table->string('id_telegram')->nullable();
            $table->string('sumber_info')->nullable();
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
        Schema::dropIfExists('event_participants');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->references('id')->on('users')
                                    ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('category_id')->references('id')->on('kategori_blogs')
                                    ->onUpdate('cascade')->onDelete('cascade');;
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('image');
            $table->text('content');
            $table->tinyInteger('status')->default(0);
            $table->string('editor_type');
            $table->softDeletes();
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
        Schema::dropIfExists('blogs');
    }
}

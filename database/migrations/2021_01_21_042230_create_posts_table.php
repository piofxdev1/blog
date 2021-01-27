<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('client_id')->nullable();
            $table->string('title')->unique();
            $table->string('slug');
            $table->integer('category_id');
            $table->integer('tag_id')->nullable();
            $table->text('image');
            $table->text('excerpt');
            $table->text('content');
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('posts');
    }
}

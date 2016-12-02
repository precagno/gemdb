<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            
            $table->increments('id_post');
            $table->string('title');
            $table->text('image');
            $table->text('preview');
            $table->text('content');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            ///////////////////////////////////////////
            
            $table->integer('views')->default(0);
            
            $table->boolean('active')->default(true);
            
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
        Schema::drop('posts');
    }
}

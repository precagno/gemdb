<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdAndCategoryIdForeignKeysToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table)
        {
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->foreign('category_id')->references('id_category')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table)
        {
            $table->dropForeign('posts_user_id_foreign');
            /*-- La llave es llamada por laravel "tabla-campo-foreign" --*/
            /* documentacion -> http://laravel.io/forum/03-22-2014-migratereset-erring-when-dropping-foreign-key*/
            
            $table->dropForeign('posts_category_id_foreign');    
        });
    }
}

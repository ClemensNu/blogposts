<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnIsBlogPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::table('blog_posts', function (Blueprint $table) {
            $table-> renameColumn ('blogPostTitle','blogPostTitle');
            $table->renameColumn ('blogPostContent','blogPostContent');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::table('blog_posts', function (Blueprint $table) {
            $table->renameColumn('blogPostTitle','title');
            $table->renameColumn('blogPostContent','content');
            });
    }
}

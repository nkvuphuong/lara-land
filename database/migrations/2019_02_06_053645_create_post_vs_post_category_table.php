<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostVsPostCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_vs_post_category', function (Blueprint $table) {
            $table->tinyInteger('post_id');
            $table->tinyInteger('post_category_id');
            $table->primary(['post_id', 'post_category_id'], 'primary_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_vs_post_category');
    }
}

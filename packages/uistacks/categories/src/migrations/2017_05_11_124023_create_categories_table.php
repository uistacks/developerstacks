<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->integer('parent_id')->default(0);
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('active');
            $table->string('class_name')->nullable();
            $table->text('options')->nullable();//json
            $table->boolean('is_featured');
            $table->integer('order_id')->nullable();
            $table->timestamps();
        });

        Schema::create('categories_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('category_id')->unsigned()->index()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('page_seo_title')->nullable();
            $table->text('page_meta_keywords')->nullable();
            $table->text('page_meta_descriptions')->nullable();
            $table->string('lang');
            $table->timestamps();
        });

        /*Schema::create('sub_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->integer('category_id')->unsigned()->index()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('cat_type')->default(0);
            $table->text('options')->nullable();//json
            $table->string('size')->nullable();
            $table->boolean('active');
            $table->integer('order_id')->nullable();
            $table->timestamps();
        });

        Schema::create('sub_categories_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('sub_category_id')->unsigned()->index()->nullable();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('page_seo_title')->nullable();
            $table->text('page_meta_keywords')->nullable();
            $table->text('page_meta_descriptions')->nullable();
            $table->string('lang');
            $table->timestamps();
        });*/

        Schema::create('user_categories', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('category_id')->unsigned()->index()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('category_level')->default(0)->nullable();
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
        Schema::dropIfExists('user_categories');
        // Schema::dropIfExists('sub_categories_trans');
        // Schema::dropIfExists('sub_categories');
        Schema::dropIfExists('categories_trans');
        Schema::dropIfExists('categories');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qnas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->string('slug')->unique();
            $table->string('options')->nullable();
            $table->boolean('active');
            $table->timestamps();
        });

        Schema::create('qnas_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('qna_id')->unsigned()->index();
            $table->foreign('qna_id')->references('id')->on('qnas')->onDelete('cascade');
            $table->string('name')->unique();
            $table->longText('body')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('lang')->default(1);
            $table->timestamps();
        });

        Schema::create('qnas_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->default(0);
            $table->integer('qna_id')->unsigned()->index()->unsigned()->default(0);
            $table->foreign('qna_id')->references('id')->on('qnas')->onDelete('cascade');
            $table->integer('from_user')->unsigned()->default(0);
			$table->foreign('from_user')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('active')->default(1);
            $table->timestamps();
        });

        Schema::create('qnas_comments_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('qna_comment_id')->unsigned()->index()->nullable();
            $table->foreign('qna_comment_id')->references('id')->on('qnas_comments')->onDelete('cascade');
            $table->longText('body')->nullable();
            $table->bigInteger('liked')->nullable();
            $table->bigInteger('disliked')->nullable();
            $table->string('lang');
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
        Schema::dropIfExists('comments_trans');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('blogs_trans');
        Schema::dropIfExists('blogs');
    }
}

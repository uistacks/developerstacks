<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->text('options')->nullable();//json
            $table->string('slug')->unique();
            $table->boolean('active');
            $table->bigInteger('order_id')->nullable();
            $table->timestamps();
        });

        Schema::create('courses_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('course_id')->unsigned()->index();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->string('name')->unique();
            $table->text('short_desc')->nullable();
            $table->longText('description')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('lang');
            $table->timestamps();
        });

        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->unsigned()->index()->unsigned()->default(0);
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
//            $table->integer('section_id')->unsigned()->default(0);
//            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->boolean('active')->default(0);
            $table->string('slug')->unique();
            $table->bigInteger('order_id')->nullable();
            $table->timestamps();
        });

        Schema::create('sections_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('section_id')->unsigned()->index()->nullable();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('lang');
            $table->timestamps();
        });

        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->unsigned()->default(0);
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->integer('section_id')->unsigned()->default(0);
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->text('options')->nullable();//json
            $table->boolean('active')->default(0);
            $table->string('slug')->unique();
            $table->integer('order_id')->nullable();
            $table->timestamps();
        });

        Schema::create('contents_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('content_id')->unsigned()->index()->nullable();
            $table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->longText('body')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_descriptions')->nullable();
            $table->string('lang');
            $table->timestamps();
        });

        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('section_id')->unsigned()->default(0);
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('active')->default(0);
            $table->timestamps();
        });

        Schema::create('videos_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('video_id')->unsigned()->index()->nullable();
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');
            $table->string('path')->nullable();
            $table->string('lang');
            $table->timestamps();
        });
        Schema::create('quizes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('section_id')->unsigned()->default(0);
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('active')->default(0);
            $table->timestamps();
        });

        Schema::create('quizes_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('quize_id')->unsigned()->index()->nullable();
            $table->foreign('quize_id')->references('id')->on('quizes')->onDelete('cascade');
            $table->text('question')->nullable();
            $table->string('lang');
            $table->timestamps();
        });
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quize_id')->unsigned()->default(0);
            $table->foreign('quize_id')->references('id')->on('quizes')->onDelete('cascade');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('active')->default(0);
            $table->timestamps();
        });

        Schema::create('answers_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('answer_id')->unsigned()->index()->nullable();
            $table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');
            $table->longText('answer')->nullable();
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
        Schema::dropIfExists('answers_trans');
        Schema::dropIfExists('answers');
        Schema::dropIfExists('quizes_trans');
        Schema::dropIfExists('quizes');
        Schema::dropIfExists('videos_trans');
        Schema::dropIfExists('videos');
        Schema::dropIfExists('contents_trans');
        Schema::dropIfExists('contents');
        Schema::dropIfExists('sections_trans');
        Schema::dropIfExists('sections');
        Schema::dropIfExists('courses_trans');
        Schema::dropIfExists('courses');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
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
            $table->softDeletes();

            $table->index(['deleted_at']);
        });

        Schema::create('topics_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('topic_id')->unsigned()->index();
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
            $table->string('title')->unique();
            $table->string('lang');
            $table->timestamps();
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('topic_id')->unsigned()->index()->unsigned()->default(0);
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
//            $table->integer('question_id')->unsigned()->default(0);
//            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->boolean('active')->default(0);
            $table->string('slug');
            $table->bigInteger('order_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['deleted_at']);
        });

        Schema::create('questions_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('question_id')->unsigned()->index()->nullable();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
//            $table->string('title')->nullable();
            $table->longText('question_text')->nullable();
            $table->longText('code_snippet')->nullable();
            $table->longText('answer_explanation')->nullable();
            $table->string('more_info_link')->nullable();
            $table->string('lang');
            $table->timestamps();
        });

        Schema::create('questions_options', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->unsigned()->default(0);
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('active')->default(0);
            $table->integer('order_id')->nullable();
            $table->timestamps();

            $table->softDeletes();

            $table->index(['deleted_at']);
        });

        Schema::create('questions_options_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('questions_option_id')->unsigned()->index()->nullable();
            $table->foreign('questions_option_id')->references('id')->on('questions_options')->onDelete('cascade');
//            $table->string('option')->unique();
            $table->string('option')->nullable()->default('N/A');
            $table->tinyInteger('correct')->nullable()->default(0);
            $table->string('lang');
            $table->timestamps();
        });

        Schema::create('quizes', function (Blueprint $table) { //tests
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['deleted_at']);
        });

        Schema::create('quizes_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('quize_id')->unsigned()->index()->nullable();
            $table->foreign('quize_id')->references('id')->on('quizes')->onDelete('cascade');
            $table->text('result')->nullable();
            $table->string('lang');
            $table->timestamps();
        });

        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quize_id')->unsigned()->default(0);
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->integer('question_id')->unsigned()->nullable();
            $table->boolean('active')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['deleted_at']);
        });

        Schema::create('answers_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('answer_id')->unsigned()->index()->nullable();
            $table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');
            $table->tinyInteger('correct')->nullable()->default(0);
            $table->integer('option_id')->unsigned()->nullable();
            $table->string('lang');
            $table->timestamps();
        });

        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('question_id')->unsigned()->default(0);
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->boolean('active')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['deleted_at']);
        });

        Schema::create('results_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('result_id')->unsigned()->index()->nullable();
            $table->foreign('result_id')->references('id')->on('results')->onDelete('cascade');
            $table->string('correct')->nullable();
            $table->datetime('date')->nullable();
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
        Schema::dropIfExists('results_trans');
        Schema::dropIfExists('results');
        Schema::dropIfExists('answers_trans');
        Schema::dropIfExists('answers');
        Schema::dropIfExists('quizes_trans');
        Schema::dropIfExists('quizes');
        Schema::dropIfExists('questions_options_trans');
        Schema::dropIfExists('questions_options');
        Schema::dropIfExists('questions_trans');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('topics_trans');
        Schema::dropIfExists('topics');
    }
}

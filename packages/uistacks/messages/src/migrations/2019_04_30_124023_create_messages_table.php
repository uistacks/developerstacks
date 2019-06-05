<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned()->index()->nullable();
//            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->string('subject')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('messages', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('thread_id')->unsigned()->index()->nullable();
            $table->foreign('thread_id')->references('id')->on('threads')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//            $table->integer('thread_id')->unsigned();
//            $table->integer('user_id')->unsigned();
            $table->text('body')->nullable();
            $table->string('file_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('participants', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('thread_id')->unsigned()->index()->nullable();
            $table->foreign('thread_id')->references('id')->on('threads')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('last_read')->nullable();
            $table->enum('window_open', ['0', '1'])->default('1')->comment('0=> No, 1=> Yes');
            $table->enum('window_minimize', ['0', '1'])->default('0')->comment('0=> No, 1=> Yes');
            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
        Schema::dropIfExists('messages');
        Schema::dropIfExists('threads');
    }

}

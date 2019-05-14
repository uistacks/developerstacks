<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->longText('faq_url')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('faq_type')->default(1);
            $table->boolean('published');
            $table->timestamps();
        });

        Schema::create('faqs_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('faq_id')->unsigned()->index();
            $table->foreign('faq_id')->references('id')->on('faqs')->onDelete('cascade');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->text('faq_seo_title')->nullable();
            $table->text('faq_meta_keywords')->nullable();
            $table->text('faq_meta_descriptions')->nullable();
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
        Schema::dropIfExists('faqs_trans');
        Schema::dropIfExists('faqs');
    }
}

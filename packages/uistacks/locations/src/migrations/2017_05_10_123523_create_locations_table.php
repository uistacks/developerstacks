<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->string('iso2',20)->nullable();
            $table->string('flag',255)->nullable();
            $table->boolean('active')->default('1');
            $table->integer('order_id')->nullable();
            $table->timestamps();
        });

        Schema::create('countries_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('country_id')->unsigned()->index();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('iso3',20)->nullable();
            $table->string('phone_code',20)->nullable();
            $table->string('phone_length',20)->nullable();
            $table->string('lang');
            $table->timestamps();
        });

        Schema::create('states', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->unsigned()->index()->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('active')->default('1');
            $table->integer('order_id')->nullable();
            $table->timestamps();
        });

        Schema::create('states_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('state_id')->unsigned()->index()->nullable();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->string('name');
            $table->string('lang');
            $table->timestamps();
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->unsigned()->index()->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->integer('state_id')->unsigned()->index()->nullable();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('active')->default('1');
            $table->integer('order_id')->nullable();
            $table->timestamps();
        });

        Schema::create('cities_trans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('city_id')->unsigned()->index()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('name');
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
        Schema::dropIfExists('cities_trans');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('states_trans');
        Schema::dropIfExists('states');
        Schema::dropIfExists('countries_trans');
        Schema::dropIfExists('countries');
    }
}

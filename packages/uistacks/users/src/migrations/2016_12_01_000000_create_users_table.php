<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->boolean('email_show')->default(0);
            $table->boolean('email_confirmed')->default(0);
            $table->string('iso2',5)->nullable();
            $table->string('phone',16)->nullable();
            $table->date('dob')->nullable();
            $table->boolean('gender')->default(0)->comment("0=> Not Specified,1=> Male, 2=> Female");
            $table->boolean('phone_show')->default(0);
            $table->boolean('phone_confirmed')->default(0);
            $table->integer('country_id')->unsigned()->index()->nullable();
            $table->integer('state_id')->unsigned()->index()->nullable();
            $table->integer('city_id')->unsigned()->index()->nullable();
            $table->string('confirmation_code')->nullable();
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->string('password', 60);
            $table->text('options')->nullable();//json format for images
            $table->boolean('confirmed')->default(0);
            $table->boolean('active')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_code')->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

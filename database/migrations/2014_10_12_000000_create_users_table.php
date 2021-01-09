<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('type')->default('user');
            $table->string('email')->unique();
            $table->string('age',3)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // $table->string('api_token',80)->uniue()->nullable()->default(null);
            $table->string('result')->nullable();
            $table->boolean('recived')->nullable();
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
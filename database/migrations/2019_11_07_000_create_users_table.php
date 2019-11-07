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
          $table->bigIncrements('id');
          $table->char('name', 50);
          $table->char('firstName', 50);
          $table->integer('phoneNumber');
          $table->string('email')->unique();
          $table->timestamp('emailVerifiedAt')->nullable();
          $table->string('password');
          $table->boolean('status');
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

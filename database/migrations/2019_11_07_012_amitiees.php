<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Amitiees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amitiees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_user1');
            $table->foreign('id_user1')->references('id')->on('users');
            $table->integer('id_user2');
            $table->foreign('id_user2')->references('id')->on('users');
            $table->double('note_user1');
            $table->double('note_user2')->default('-1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amitiees');
    }
}

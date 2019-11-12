<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Entreprises extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('entreprises', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->char('nom', 200)->unique();
          $table->char('numeroVoie', 50);
          $table->char('rue', 200);
          $table->char('ville', 200);
          $table->integer('codePostale');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entreprises');
    }
    
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Formations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('dernierAjout')->default(false);
            $table->integer('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->char('ecole', 200);
            $table->char('diplome', 200);
            $table->date('dateDebut');
            $table->date('dateFin')->nullable();
            $table->char('resultat', 200)->nullable();
            $table->string('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formations');
    }
}

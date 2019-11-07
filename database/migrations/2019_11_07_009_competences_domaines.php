<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompetencesDomaines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competences_domaines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_competence');
            $table->foreign('id_competence')->references('id')->on('competences');
            $table->integer('id_domaine');
            $table->foreign('id_domaine')->references('id')->on('domaines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competences_domaines');
    }
}

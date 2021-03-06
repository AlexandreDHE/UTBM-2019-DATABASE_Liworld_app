<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EntreprisesDomaines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises_domaines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_entreprise');
            $table->foreign('id_entreprise')->references('id')->on('entreprises')->onDelete('cascade');
            $table->integer('id_domaine');
            $table->foreign('id_domaine')->references('id')->on('domaines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entreprises_domaines');
    }
}

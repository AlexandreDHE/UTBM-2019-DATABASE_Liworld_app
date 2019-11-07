<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FormationsDomaines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations_domaines', function (Blueprint $table) {
            $table->integer('id_formations');
            $table->foreign('id_formations')->references('id')->on('formations');
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
        Schema::dropIfExists('formations_domaines');
    }
}

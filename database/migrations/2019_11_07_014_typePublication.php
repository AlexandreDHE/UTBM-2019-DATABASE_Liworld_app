<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TypePublication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typePublication', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_publication');
            $table->foreign('id_publication')->references('id')->on('publication');
            $table->integer('id_typesContrats');
            $table->foreign('id_typesContrats')->references('id')->on('typesContrats');
            $table->date('dateDebut');
            $table->date('dateFin')->nullable();
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
        Schema::dropIfExists('typePublication');
    }
}

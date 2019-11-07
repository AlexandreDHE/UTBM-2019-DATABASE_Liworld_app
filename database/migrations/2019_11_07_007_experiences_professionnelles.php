<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExperiencesProfessionnelles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('experiencesProfessionnelles', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->integer('id_user');
          $table->foreign('id_user')->references('id')->on('users');
          $table->integer('id_typesContrats');
          $table->foreign('id_typesContrats')->references('id')->on('typesContrats');

          $table->integer('id_entreprise');
          $table->foreign('id_entreprise')->references('id')->on('entreprises');
          $table->char('nomPoste', 200);
          $table->date('dateDebut');
          $table->date('dateFin');
          $table->string('description');

          $table->integer('numeroVoie');
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
        Schema::dropIfExists('experiencesProfessionnelles');
    }
}

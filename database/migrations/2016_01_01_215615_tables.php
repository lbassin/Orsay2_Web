<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('utilisateur', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nom');
        $table->string('prenom');
        $table->string('email');
        $table->date('dateNaissance');
        $table->string('adresse');
        $table->string('tel');
        $table->string('telPortable');
        $table->string('password');
        $table->integer('type');
        $table->timestamps();
      });

      Schema::create('entreprise', function (Blueprint $table) {
        $table->increments('id')->unsigned();
        $table->string('nom');
        $table->string('rue');
        $table->integer('cp');
        $table->string('ville');
        $table->timestamps();
      });

      Schema::create('tuteur', function (Blueprint $table) {
        $table->integer('idUtilisateur')->unsigned();
        $table->integer('idEntreprise')->unsigned();
        $table->timestamps();

        $table->primary('idUtilisateur');
        $table->foreign('idUtilisateur')->references('id')->on('utilisateur');
        $table->foreign('idEntreprise')->references('id')->on('entreprise');

      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('tuteur');
      Schema::drop('entreprise');
      Schema::drop('utilisateur');

    }
}
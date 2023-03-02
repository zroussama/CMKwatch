<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiches', function (Blueprint $table) {
            $table->id('id');
            $table->string('entreprise');
            $table->string('domaine_activite');
            $table->string('gerant_nom');
            $table->string('gerant_prenom');
            $table->integer('gerant_tel');
            $table->string('gerant_email');
            $table->string('autre_nom');
            $table->string('autre_prenom');
            $table->integer('autre_tel');
            $table->string('autre_email');
            $table->string('autre_fonction');
            $table->string('Pays_Origine');
            $table->string('Ville_Origine');
            $table->string('Prod_pays');
            $table->string('prod_ville');
            $table->string('Prod_adress');
            $table->string('Origin_adress');
            $table->string('logo');
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
        Schema::drop('fiches');
    }
};

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
        Schema::create('moyenTransport', function (Blueprint $table) {
            $table->id('id');
            $table->string('marque')->nullable;
            $table->string('modele')->nullable;
            $table->string('taille')->nullable;
            $table->timestamps();
            $table->softDeletes('Effacer')->nullable;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('moyenTransport');
    }
};

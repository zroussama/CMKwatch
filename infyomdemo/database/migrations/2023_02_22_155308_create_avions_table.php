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
        Schema::create('avions', function (Blueprint $table) {
            $table->id('id');
            $table->string('nom')->nullable;
            $table->integer('taille')->nullable;
            $table->integer('places')->nullable;
            $table->string('ficheClient')->nullable;
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
        Schema::drop('avions');
    }
};

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
        Schema::create('connections', function (Blueprint $table) {
            $table->id('idConnexion');
            $table->json('Parametre')->nullable();
            $table->enum('type_heb', ['CLOUD', 'PROMISE']);
            $table->enum('PROMISE', ['VPN', 'SSH'])->nullable();
            $table->string('link')->nullable();
            $table->string('ip')->nullable();
            $table->string('ip_wan')->nullable();
            $table->string('ip_lan')->nullable();
            $table->integer('port')->nullable();
            $table->string('filebat')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::drop('connections');
    }
};

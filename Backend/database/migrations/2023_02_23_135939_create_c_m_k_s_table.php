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
        Schema::create('c_m_k_s', function (Blueprint $table) {
            $table->id('id');
            $table->string('CMK_ID');
            $table->string('Facturation');
            $table->softDeletes();
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
        //Schema::drop('c_m_k_s');
        Schema::drop('c_m_k_s', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};

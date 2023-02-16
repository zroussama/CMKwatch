<?php

/*
    _____                                      ________  __  __                   ______                                                     __                         
   |     \                                    |        \|  \|  \                 /      \                                                   |  \                        
    \$$$$$  _______   ______   _______        | $$$$$$$$ \$$| $$  ______        |  $$$$$$\  ______   _______    ______    ______   ______  _| $$_     ______    ______  
      | $$ /       \ /      \ |       \       | $$__    |  \| $$ /      \       | $$ __\$$ /      \ |       \  /      \  /      \ |      \|   $$ \   /      \  /      \ 
 __   | $$|  $$$$$$$|  $$$$$$\| $$$$$$$\      | $$  \   | $$| $$|  $$$$$$\      | $$|    \|  $$$$$$\| $$$$$$$\|  $$$$$$\|  $$$$$$\ \$$$$$$\\$$$$$$  |  $$$$$$\|  $$$$$$\
|  \  | $$ \$$    \ | $$  | $$| $$  | $$      | $$$$$   | $$| $$| $$    $$      | $$ \$$$$| $$    $$| $$  | $$| $$    $$| $$   \$$/      $$ | $$ __ | $$  | $$| $$   \$$
| $$__| $$ _\$$$$$$\| $$__/ $$| $$  | $$      | $$      | $$| $$| $$$$$$$$      | $$__| $$| $$$$$$$$| $$  | $$| $$$$$$$$| $$     |  $$$$$$$ | $$|  \| $$__/ $$| $$      
 \$$    $$|       $$ \$$    $$| $$  | $$      | $$      | $$| $$ \$$     \       \$$    $$ \$$     \| $$  | $$ \$$     \| $$      \$$    $$  \$$  $$ \$$    $$| $$      
  \$$$$$$  \$$$$$$$   \$$$$$$  \$$   \$$       \$$       \$$ \$$  \$$$$$$$        \$$$$$$   \$$$$$$$ \$$   \$$  \$$$$$$$ \$$       \$$$$$$$   \$$$$   \$$$$$$  \$$      
                                                                                                                                                                        
                                                                                                                                                                        
                                                                                                                                                                            
                                                                          
*/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\enum\Constant;

class CreateConnexionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connexions', function (Blueprint $table) {
            $table->id('idConnexion');
            //$table->jsonData('parametre');
            
            $table->enum('TYPE_HEBERGEMENT', array('CLOUD', 'PROMISE'));
            $table->enum('PROMISE_CASE', array('SSH','VPN','IPSEC'));
            $table->enum('STATUS', array('OPEN','CLOSED'));
            
            //$table->HEB_TYPE('status');
            
            $table->string('name')->default("127");;
            $table->string('domain')->default(".0.0.1");
            $table->integer('port')->default(8000);

            $table->string('link');
            //$table->string('link')->default(name+domain+":"+port);

            $table->string('username')->nullable();
            $table->string('password')->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            //$table->nullableTimestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('connexions');
    }
};

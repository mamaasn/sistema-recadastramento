<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFounderServantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('founder_servant', function (Blueprint $table) {
            $table->increments('id');
            /**
             * Instituidores
             */
            $table->unsignedInteger('founder_id');
            $table->foreign('founder_id')
                ->references('id')
                ->on('founders')
                ->onDelete('cascade');
            
            /**
             * Servidores
             */
            $table->unsignedInteger('servant_id');
            $table->foreign('servant_id')
                ->references('id')
                ->on('dependents')
                ->onDelete('cascade');
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
        Schema::dropIfExists('founder_servant');
    }
}

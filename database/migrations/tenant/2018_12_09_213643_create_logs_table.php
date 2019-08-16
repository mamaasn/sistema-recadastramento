<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('acoes');

            /**
             * Usuarios
             */
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            
            /**
             * Servidores
             */
            $table->unsignedInteger('servant_id')->nullable();
            $table->foreign('servant_id')
                ->references('id')
                ->on('servants')
                ->onDelete('cascade');

            /**
             * Dependentes
             */
            $table->unsignedInteger('dependent_id')->nullable();
            $table->foreign('dependent_id')
                ->references('id')
                ->on('dependents')
                ->onDelete('cascade');

            /**
             * Tempo Anterior
             */
            $table->unsignedInteger('time_id')->nullable();
            $table->foreign('time_id')
                ->references('id')
                ->on('times')
                ->onDelete('cascade');

            /**
             * Instituidores
             */
            $table->unsignedInteger('founder_id')->nullable();
            $table->foreign('founder_id')
                ->references('id')
                ->on('founders')
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
        Schema::dropIfExists('logs');
    }
}

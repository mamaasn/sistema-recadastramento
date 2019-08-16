<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServantTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servant_time', function (Blueprint $table) {
            $table->increments('id');
            /**
             * Servidores
             */
            $table->unsignedInteger('servant_id');
            $table->foreign('servant_id')
                ->references('id')
                ->on('servants')
                ->onDelete('cascade');

            /**
             * Tempo Anterior
             */
            $table->unsignedInteger('time_id');
            $table->foreign('time_id')
                ->references('id')
                ->on('times')
                ->onDelete('cascade');

            $table->date('data_inicio')->nullable();
            $table->date('data_fim')->nullable();

            $table->string('tipo_vinculo', 30)->nullable();
            $table->string('tipo_regime_trabalho', 30)->nullable();
            $table->enum('caracteristicas_especiais', ['Nenhum', 'Professor', 'Exposição Agente/Nocivo'])->nullable();

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
        Schema::dropIfExists('servant_time');
    }
}

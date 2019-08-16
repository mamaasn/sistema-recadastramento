<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('protocolo')->nullable();
            $table->date('data_agendada')->nullable();
            $table->time('hora_agendada')->nullable();
            $table->timestamps();

            /**
             * Servidores
             */
            $table->unsignedInteger('servant_id')->nullable();
            $table->foreign('servant_id')
                ->references('id')
                ->on('servants')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}

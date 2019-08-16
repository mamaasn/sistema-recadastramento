<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('times', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('natureza_juridica', ['Pública', 'Privada'])->nullable();
            $table->string('cnpj', 19)->nullable();;
            $table->string('razao_social', 30)->nullable();;
            $table->timestamps();
            
            //$table->string('tipo_vinculo', 30)->nullable();
            //$table->string('tipo_regime_trabalho', 30)->nullable();
            //$table->enum('caracteristicas_especiais', ['Nenhum', 'Professor', 'Exposição Agente/Nocivo'])->nullable();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('times');
    }
}

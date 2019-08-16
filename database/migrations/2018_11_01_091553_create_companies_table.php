<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            /**
             * UUID
             */
            $table->uuid('uuid')->nullable();

            /**
             * Documentos Pessoais
             */
            $table->string('cnpj')->unique()->nullable();;
            $table->string('razao_social')->unique()->nullable();;
            $table->string('nome_fantasia')->nullable();;

            /**
             * Contato
             */
            $table->string('telefone', 20)->nullable();
            $table->string('telefone2', 20)->nullable();
            $table->string('email')->nullable();

            /**
             * Dados do banco de dados
             */
            $table->string('sub_domain')->unique()->nullable();
            $table->string('bd_hostname')->nullable();
            $table->string('bd_database')->unique()->nullable();
            $table->string('bd_username')->nullable();
            $table->string('bd_password')->nullable();

            /**
             * Realções
             */
            $table->unsignedInteger('address_id')->nullable();
            $table->foreign('address_id')
                        ->references('id')
                        ->on('addresses')
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
        Schema::dropIfExists('companies');
    }
}

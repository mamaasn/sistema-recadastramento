<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Tabela de usuários dos clientes
         * Ex: Coordenador, Recadastrador
         */
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            /**
             * Documentos Pessoais
             */
            $table->string('cpf', 20)->nullable();
            $table->string('rg', 20)->nullable();

            /**
             * Contato
             */
            $table->string('telefone', 20)->nullable();
            $table->string('celular', 20)->nullable();
            $table->string('celular2', 20)->nullable();

            /**
             * Relações
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
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 60)->nullable();
            $table->string('cpf', 11)->nullable();
            $table->string('numero_rg', 15)->nullable();
            $table->string('orgao_rg', 8)->nullable();
            $table->string('uf_rg', 2)->nullable();
            $table->date('data_emissao_rg')->nullable();
            $table->enum('sexo', ['F', 'M']);
            $table->date('data_nascimento')->nullable();
            $table->string('nome_mae', 60)->nullable();
            $table->string('nome_pai', 60)->nullable();
            $table->string('cidade_nascimento', 30)->nullable();
            $table->string('uf_nascimento', 2)->nullable();
            $table->string('nome_cartorio', 60)->nullable();
            $table->string('numero_registro_cartorio', 10)->nullable();
            $table->string('numero_livro_cartorio', 10)->nullable();
            $table->string('numero_folha_cartorio', 10)->nullable();
            $table->string('naturalidade', 30)->nullable();
            $table->string('tipo_dependencia', 30)->nullable();
            $table->enum('deficiente', ['S', 'N'])->default('N')->nullable();
            $table->enum('invalido', ['S', 'N'])->default('N')->nullable();
            $table->enum('universitario', ['S', 'N'])->default('N')->nullable();
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
        Schema::dropIfExists('dependents');
    }
}

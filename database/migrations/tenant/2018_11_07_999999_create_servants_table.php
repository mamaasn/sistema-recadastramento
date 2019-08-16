<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('registro')->nullable();
            $table->string('matricula')->nullable();
            $table->string('nome', 60)->nullable();
            $table->enum('sexo', ['F', 'M'])->default('F')->nullable();
            $table->string('cpf', 11)->nullable();
            $table->string('nome_mae', 60)->nullable();
            $table->string('cpf_mae', 11)->nullable();
            $table->string('nome_pai', 60)->nullable();
            $table->string('cpf_pai', 11)->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('uf_nascimento', 2)->nullable();
            $table->string('cidade_nascimento', 30)->nullable();
            $table->string('registro_nascimento', 15)->nullable();
            $table->string('livro', 10)->nullable();
            $table->string('folha', 10)->nullable();
            $table->string('ano_chegada', 4)->nullable();
            $table->enum('necessidades_especiais', ['N', 'S'])->default('N')->nullable();
            $table->enum('alergia_medicamentos', ['S', 'N'])->default('N')->nullable();
            $table->string('medicamentos', 30)->nullable();
            $table->string('altura', 10)->nullable();
            $table->string('peso', 10)->nullable();
            $table->enum('tipo_sanguineo', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])->nullable();
            $table->enum('doador', ['S', 'N'])->default('N')->nullable();
            $table->string('cor_olhos', 20)->nullable();
            $table->string('cor_cabelo', 20)->nullable();
            $table->string('numero_rg', 15)->nullable();
            $table->string('orgao_rg', 8)->nullable();
            $table->string('uf_rg', 2)->nullable();
            $table->date('data_emissao_rg')->nullable();
            $table->string('numero_titulo', 13)->nullable();
            $table->string('zona_titulo', 3)->nullable();
            $table->string('secao_titulo', 5)->nullable();
            $table->string('uf_titulo', 2)->nullable();
            $table->string('numero_ctps', 7)->nullable();
            $table->string('serie_ctps', 5)->nullable();
            $table->string('uf_ctps', 2)->nullable();
            $table->date('data_emissao_ctps')->nullable();
            $table->string('numero_documento_profissional', 15)->nullable();
            $table->string('tipo_documento_profissional', 10)->nullable();
            $table->string('uf_documento_profissional', 2)->nullable();
            $table->string('pis', 11)->nullable();
            $table->string('reservista', 15)->nullable();
            $table->string('numero_cnh', 14)->nullable();
            $table->string('uf_cnh', 2)->nullable();
            $table->date('data_expedicao_cnh')->nullable();
            $table->date('data_validade_cnh')->nullable();
            $table->string('categoria_cnh', 5)->nullable();
            $table->string('cep', 8)->nullable();
            $table->string('logradouro', 70)->nullable();
            $table->string('bairro', 72)->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('uf_endereco', 2)->nullable();
            $table->string('cidade', 30)->nullable();
            $table->string('cidade_codigo_ibge', 10)->nullable();
            $table->string('complemento', 20)->nullable();
            $table->string('telefone_fixo', 11)->nullable();
            $table->string('fone_celular', 11)->nullable();
            $table->string('email', 60)->nullable();
            $table->string('observacoes', 100)->nullable();
            $table->string('foto', 100)->default('nophoto.jpg')->nullable();
            $table->string('observacoes_documentos', 100)->nullable();

            
            $table->string('numero_ctc_inss', 30)->nullable();
            $table->string('path_ctc_inss')->nullable();
            $table->string('file_ctc_inss')->nullable();

            $table->string('numero_ctc_regime_proprio', 30)->nullable();
            $table->string('path_ctc_regime_proprio')->nullable();
            $table->string('file_ctc_regime_proprio')->nullable();


            $table->enum('tipo_declarante', ['proprio', 'representante', 'procurador']);

            /**
             * Cargo ?
             */
            $table->string('cargo', 100)->nullable();
            $table->date('data_admissao')->nullable();
            $table->string('orgao', 100)->nullable();
            $table->string('departamento', 100)->nullable();
            $table->date('data_concessao_aposentadoria')->nullable();
            $table->string('numero_concessao_aposentadoria', 30)->nullable();
            $table->date('data_concessao_pensao')->nullable();
            $table->string('tipo_beneficio', 30)->nullable();


            /**
             * Documentos entregues
             */
            $table->boolean('documento_entregue_rg')->default(false)->nullable();
            $table->boolean('documento_entregue_cpf')->default(false)->nullable();
            $table->boolean('documento_entregue_certidao_casamento')->default(false)->nullable();
            $table->boolean('documento_entregue_ctps')->default(false)->nullable();
            $table->boolean('documento_entregue_foto')->default(false)->nullable();
            $table->boolean('documento_entregue_certidao_nascimento')->default(false)->nullable();
            $table->boolean('documento_entregue_ctc_inss')->default(false)->nullable();
            $table->boolean('documento_entregue_ctc_regime_proprio')->default(false)->nullable();
            

            /**
             * Finalizado true or false
             * 
             */
            $table->boolean('finalizado')->default(false)->nullable();
            $table->boolean('parcial')->default(false)->nullable();

            /******************************************************************************
             * Relações 1 x N
             */

            /**
             * Nacionalidades
             */
            $table->unsignedInteger('nationality_id')->nullable();
            $table->foreign('nationality_id')
                ->references('id')
                ->on('nationalities')
                ->onDelete('cascade');

            /**
             * Estado Civil
             */
            $table->unsignedInteger('martial_status_id')->nullable();
            $table->foreign('martial_status_id')
                ->references('id')
                ->on('martial_statuses')
                ->onDelete('cascade');

            /**
             * Instrução
             */
            $table->unsignedInteger('instruction_id')->nullable();
            $table->foreign('instruction_id')
                ->references('id')
                ->on('instructions')
                ->onDelete('cascade');

            /**
             * Deficiência Física
             */
            $table->unsignedInteger('physical_disability_id')->nullable();
            $table->foreign('physical_disability_id')
                ->references('id')
                ->on('physical_disabilities')
                ->onDelete('cascade');

            /**
             * Raça
             */
            $table->unsignedInteger('race_id')->nullable();
            $table->foreign('race_id')
                ->references('id')
                ->on('races')
                ->onDelete('cascade');

            /**
             * Tipo de Logradouro
             */
            $table->unsignedInteger('public_place_id')->nullable();
            $table->foreign('public_place_id')
                ->references('id')
                ->on('public_places')
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
        Schema::dropIfExists('servants');
    }
}
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependentServantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependent_servant', function (Blueprint $table) {
            $table->increments('id');
            /**
             * Dependentes
             */
            $table->unsignedInteger('dependent_id');
            $table->foreign('dependent_id')
                ->references('id')
                ->on('dependents')
                ->onDelete('cascade');
            
            /**
             * Servidores
             */
            $table->unsignedInteger('servant_id');
            $table->foreign('servant_id')
                ->references('id')
                ->on('servants')
                ->onDelete('cascade');

            /**
             * Parentesco
             */
            $table->unsignedInteger('kinship_id')->nullable();
            $table->foreign('kinship_id')
                ->references('id')
                ->on('kinships')
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
        Schema::dropIfExists('dependent_servant');
    }
}

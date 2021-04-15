<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brs', function (Blueprint $table) {
            $table->id();   
            $table->integer('activite_id');   
            $table->integer('agent_id');
            $table->string('fonction');
            $table->string('montant');
            $table->string('num_equipe');
            $table->date('date_de_virement');
            $table->string('etat');
            $table->string('verificateur')->nullable();
            $table->date('verifie_le')->nullable();

            $table->foreign('agent_id')
                    ->references('id')
                    ->on('agents');
            $table->foreign('activite_id')
                    ->references('id')
                    ->on('activites');
            
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
        Schema::dropIfExists('brs');
    }
}

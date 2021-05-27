<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('prenom')->nullable();
            $table->string('fonction');
            $table->string('num_equipe');
            $table->string('adresse');
            $table->string('telephone');
            $table->integer('projets_id')->nullable();

            $table->foreign('projets_id')
                    ->references('id')
                    ->on('projets')
                    ->onUpdate('cascade')->onDelete('cascade');
                    
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
        Schema::dropIfExists('agents');
    }
}

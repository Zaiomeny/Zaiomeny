<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');  
            $table->integer('projets_id');
            $table->integer('agents_id');
            $table->string('montant');
            $table->date('date_de_virement');


            $table->foreign('projets_id')
                    ->references('id')
                    ->on('projets')
                    ->onUpdate('cascade')->onDelete('cascade');  
            $table->foreign('agents_id')
                    ->references('id')
                    ->on('agents')
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
        Schema::dropIfExists('activites');
    }
}

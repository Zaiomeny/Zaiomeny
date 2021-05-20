<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('agent_id');
            $table->integer('activite_id');
            $table->string('libele_d_activite');
            $table->string('prix');

           
            $table->foreign('agent_id')
                    ->references('id')
                    ->on('agents')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('activite_id')
                    ->references('id')
                    ->on('activites')
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
        Schema::dropIfExists('details');
    }
}

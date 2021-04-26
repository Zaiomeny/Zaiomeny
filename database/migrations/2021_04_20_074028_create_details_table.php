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
            $table->id();
            $table->integer('activite_id');
            $table->integer('agent_id');
            $table->string('libele_d_activite');
            $table->string('prix');

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
        Schema::dropIfExists('details');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('projet_id');
            $table->string('agent_id');
            $table->string('activite_nom');
            $table->string('total_a_justifier');
            $table->string('total_justifie');
            $table->string('reste')->nullable();
            $table->string('observation')->nullable();
            $table->string('date_d_arrivee_de_pjs');
            $table->string('date_de_verification');
            $table->string('verificateur');

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
        Schema::dropIfExists('verifications');
    }
}
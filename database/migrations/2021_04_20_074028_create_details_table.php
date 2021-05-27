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
            $table->integer('agents_id');
            $table->integer('activites_id');
            $table->string('libele_d_activite');
            $table->string('prix');

           
            $table->foreign('agents_id')
                    ->references('id')
                    ->on('agents')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('activites_id')
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

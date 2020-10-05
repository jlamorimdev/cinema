<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('filme_id');
            $table->unsignedBigInteger('sala_id');
            $table->string('horario');

            $table->foreign('filme_id')
                ->references('id')
                ->on('filme');
            $table->foreign('sala_id')
                ->references('id')
                ->on('sala');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

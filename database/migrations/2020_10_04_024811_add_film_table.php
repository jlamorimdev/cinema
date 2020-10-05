<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filme', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('duracao');
            $table->boolean('tresd');
            $table->string('banner');
            $table->unsignedBigInteger('categoria_id');

            $table->foreign('categoria_id')
                ->references('id')
                ->on('filme_categoria');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('filme');
    }
}

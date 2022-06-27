<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotacaoFreteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotacao_frete', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uf', 2);
            $table->decimal('percentual_cotacao', 10, 2);
            $table->decimal('valor_extra', 10, 2);
            $table->unsignedInteger('transportadora_id');
            $table->foreign('transportadora_id')->references('id')->on('transportadora');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotacao_frete');
    }
}

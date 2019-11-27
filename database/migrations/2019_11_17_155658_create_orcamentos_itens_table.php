<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrcamentosItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orcamentos_itens', function (Blueprint $table) {
            $table->increments('id');
            $table->char('tamanho',2);
            $table->string('cor',30);
            $table->string('detalhe',30);
            $table->double('valor');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->integer('tipos_itens_id')->unsigned();
            $table->foreign('tipos_itens_id')->references('id')->on('tipos_itens');
            $table->softDeletes();
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
        Schema::dropIfExists('orcamentos_itens');
    }
}

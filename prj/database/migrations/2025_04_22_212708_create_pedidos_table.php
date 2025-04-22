<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('pedidos', function (Blueprint $table) {
        $table->id();
        $table->date('data');
        $table->string('nomeCliente');
        $table->string('pedido');
        $table->string('endereco');
        $table->text('observacoes')->nullable();
        $table->boolean('feito')->default(false); // usado para "marcar como feito"
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
        Schema::dropIfExists('pedidos');
    }
};

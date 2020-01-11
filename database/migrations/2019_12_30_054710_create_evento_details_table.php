<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventoDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('evento_id');
            $table->integer('pessoa_id');            
            $table->float('valor', 8, 2)->nullable();
            $table->enum('tipo', ['Incrição', 'Incrição/Ônibus'])->nullable();
            $table->enum('status_evento', ['Pago', 'á Pagar'])->nullable();
            $table->enum('status', ['Ativo', 'Inativo'])->nullable();
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
        Schema::dropIfExists('evento_details');
    }
}

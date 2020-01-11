<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descricao')->nullable();
            $table->float('valor', 8, 2)->nullable();
            $table->date('data_balance')->nullable();
            $table->enum('tipo', ['Despesa', 'Receita'])->nullable();
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
        Schema::dropIfExists('balances');
    }
}

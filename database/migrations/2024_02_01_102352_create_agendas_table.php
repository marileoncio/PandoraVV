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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->biginteger('profissional_id')->unsigned()->nullable(false);
            $table->integer('cliente_id')->unsigned()->nullable(true);
            $table->dateTime('data_Hora' )->nullable(false);
            $table->integer('servico_id')->unsigned()->nullable(true);
            $table->string('pagamento', 20)->nullable(true);
            $table->integer('valor')->nullable(true);
            $table->foreign('profissional_id')->references('id')->on('profissionals');
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
        Schema::dropifExists('agendas');
    }
};
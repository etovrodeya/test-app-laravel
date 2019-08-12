<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('clients_id')->unsigned();
            $table->bigInteger('tariffs_id')->unsigned();
            $table->bigInteger('addresses_id')->unsigned();
            $table->integer('price')->unsigned();
            $table->integer('count')->unsigned();
            $table->string('status');
            $table->date('delivery_day');
            $table->timestamps();
        });

        Schema::table('orders', function($table){
            $table->foreign('clients_id')->references('id')->on('clients')->on_delete('restrict');
            $table->foreign('tariffs_id')->references('id')->on('tariffs')->on_delete('restrict');
            $table->foreign('addresses_id')->references('id')->on('addresses')->on_delete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

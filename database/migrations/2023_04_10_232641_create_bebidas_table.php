<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBebidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bebidas', function (Blueprint $table) {
            $table->id('id');
            $table->text('Nombre','200')->nullable(false);
            $table->text('Sabor','200')->nullable(false);
            $table->integer('Cantidad')->length(11);
            $table->float('Calorico', 8, 2);
            $table->float('Precio', 8, 2)->nullable(false);
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
        Schema::dropIfExists('bebidas');
    }
}

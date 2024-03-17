<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeaderTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_tables', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('table_id');
            $table->string('dataField')->comment('Indica el nombre del campo cómo proviene de base de datos');
            $table->string('caption')->comment('');
            $table->string('type')->comment('Indica el tipo de dato para la grid, por defecto string, otros datos: number, date')->default('string');
            $table->string('alignment')->comment('Indica alineación de la columna left|center|right')->default('left');
            $table->string('format')->comment('Formato de la columna | ejemplo: currency, percent')->nullable();
            $table->string('groupIndex')->comment('Indica si se agrupará por esta columna, en caso que si se indicará indice de agrupamiento iniciando por 0 ')->nullable();
            $table->string('sortIndex')->comment('Indica el ordenamiento de la columna | asc - desc')->nullable();
            $table->tinyInteger('fixed')->comment('Indica si la columna estará fija | 1 si - 0 no, 0 por defecto')->default(0);
            $table->tinyInteger('visible')->comment('Indica si la está visible | 1 si - 0 no, 1 por defecto')->default(1);
            $table->unsignedInteger('width')->comment('En caos que se necesite un ancho especial para la columna')->nullable();
            $table->unsignedInteger('order')->comment('Indica el orden de las columnas en la grid');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('table_id')->references('id')->on('tables');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('header_tables');
    }
}

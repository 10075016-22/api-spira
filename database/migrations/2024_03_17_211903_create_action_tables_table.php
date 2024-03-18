<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_tables', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('table_id');
            $table->unsignedBigInteger('component_id');
            $table->unsignedInteger('order');

            $table->timestamps();

            $table->foreign('table_id')->references('id')->on('tables');
            $table->foreign('component_id')->references('id')->on('components');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('action_tables');
    }
}

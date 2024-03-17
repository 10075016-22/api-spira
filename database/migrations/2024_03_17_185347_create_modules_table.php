<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();

            $table->string('module')->comment('Indica el texto del módulo');
            $table->string('description')->comment('Indica descripción');
            $table->string('icon');
            $table->string('name')->comment('Indica el name asociado al router de vue');
            $table->unsignedInteger('order');
            $table->unsignedTinyInteger('status')->default(1);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}

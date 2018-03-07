<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanillaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planilla', function (Blueprint $table) {
             $table->increments('planillaid');
            $table->integer('iddocente')->unsigned();
            $table->integer('idinstitucion')->unsigned();
            $table->string('anio',30);
            $table->string('mes',30);
            
            $table->string('imagen',100);
            
            $table->foreign('iddocente')->references('docenteid')->on('docente');
            
            $table->foreign('idinstitucion')->references('institucionid')->on('institucion');

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
        Schema::dropIfExists('planilla');
    }
}

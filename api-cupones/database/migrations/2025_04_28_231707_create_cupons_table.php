<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuponsTable extends Migration
{
    public function up()
    {
        Schema::create('cupons', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique(); 
            $table->string('descripcion'); 
            $table->date('fecha_e'); 
            $table->boolean('canjeado')->default(false); 
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('cupons');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('catalogo_nombres', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('id_catnombres');
            $table->string('nombre');
            $table->unsignedBigInteger('clasificacion_id');
            $table->string('codigo_categoria')->nullable();
            $table->text('descripcion')->nullable();

            $table->foreign('clasificacion_id')->references('idclasificacion')->on('clasificaciones')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('catalogo_nombres');
    }
};

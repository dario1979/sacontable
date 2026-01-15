<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('asientos_contables', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('idasiento');

            $table->date('fecha');
            $table->string('descripcion')->nullable();
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->integer('nro_asiento')->default(0);

            $table->foreign('usuario_id')->references('idusuario')->on('usuarios')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asientos_contables');
    }
};

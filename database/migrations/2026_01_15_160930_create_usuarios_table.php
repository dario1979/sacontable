<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('idusuario');

            $table->string('usuario')->unique();
            $table->string('email')->unique();
            $table->string('clave');
            $table->string('apellido');
            $table->string('nombre');

            $table->unsignedBigInteger('idrol')->nullable();
            $table->char('activo', 1)->default('T');
            $table->dateTime('ultimo_inicio_sesion')->nullable();
            $table->string('cuil')->nullable();

            $table->foreign('idrol')->references('idrol')->on('roles')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};

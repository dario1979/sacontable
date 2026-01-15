<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('clasificaciones', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('idclasificacion');
            $table->string('nro_cuenta')->nullable();
            $table->string('nombre');
            $table->boolean('recibe_saldo')->default(false);
            $table->string('tipo')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clasificaciones');
    }
};

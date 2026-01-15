<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('idcuenta');

            $table->string('nombre');
            $table->string('nro_cuenta');
            $table->decimal('saldo_actual', 15, 2)->default(0);
            $table->boolean('recibe_saldo')->default(false);
            $table->string('tipo')->nullable();

            // Flags estilo legacy ('T' / 'F')
            $table->char('utilizada', 1)->default('F');
            $table->char('eliminada', 1)->default('F');
            $table->char('modificado', 1)->default('F');
            $table->char('solo_admin', 1)->default('T');

            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->unsignedBigInteger('id_padre')->nullable();

            $table->foreign('usuario_id')->references('idusuario')->on('usuarios')->onDelete('set null');
            $table->foreign('id_padre')->references('idcuenta')->on('cuentas')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cuentas');
    }
};

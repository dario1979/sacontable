<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('asiento_cuenta', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('idasientocuenta');

            $table->unsignedBigInteger('asiento_id');
            $table->unsignedBigInteger('cuenta_id');

            $table->decimal('debe', 15, 2)->default(0);
            $table->decimal('haber', 15, 2)->default(0);
            $table->decimal('saldo', 15, 2)->default(0);

            // índices ayudan a MySQL con FKs
            $table->index('asiento_id');
            $table->index('cuenta_id');

            $table->foreign('asiento_id')->references('idasiento')->on('asientos_contables')->onDelete('cascade');
            $table->foreign('cuenta_id')->references('idcuenta')->on('cuentas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asiento_cuenta');
    }
};

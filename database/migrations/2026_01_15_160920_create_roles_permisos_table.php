<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('roles_permisos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('rol_id');
            $table->unsignedBigInteger('permiso_id');

            $table->primary(['rol_id', 'permiso_id']);

            $table->foreign('rol_id')->references('idrol')->on('roles')->onDelete('cascade');
            $table->foreign('permiso_id')->references('idpermiso')->on('permisos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roles_permisos');
    }
};

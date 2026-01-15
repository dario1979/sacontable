<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('audit_log', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();

            $table->string('table_name');
            $table->string('action'); // INSERT / UPDATE / DELETE

            $table->unsignedBigInteger('user_id')->nullable();

            // En MySQL: json funciona bien; si tu versión no lo soporta, cambialo por text()
            $table->json('old_values')->nullable();
            $table->json('new_values')->nullable();

            $table->timestamp('created_at')->useCurrent();

            $table->foreign('user_id')->references('idusuario')->on('usuarios')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('audit_log');
    }
};

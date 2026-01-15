<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    public function run(): void
    {
        // Si preferís no truncar usuarios en dev, sacá estas 2 líneas
        DB::table('usuarios')->truncate();

        DB::table('usuarios')->insert([
            'idusuario' => 1,
            'usuario' => 'admin',
            'email' => 'admin@local',
            'clave' => Hash::make('admin123'),
            'apellido' => 'ADMIN',
            'nombre' => 'ADMIN',
            'idrol' => 1,
            'activo' => 'T',
            'ultimo_inicio_sesion' => null,
            'cuil' => null,
        ]);
    }
}


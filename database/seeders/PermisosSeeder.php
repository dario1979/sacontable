<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('permisos')->truncate();

        // Ajustá esta lista a tus permisos reales si querés granularidad
        DB::table('permisos')->insert([
            ['idpermiso' => 1, 'descripcion' => 'dashboard.ver'],
            ['idpermiso' => 2, 'descripcion' => 'usuarios.ver'],
            ['idpermiso' => 3, 'descripcion' => 'usuarios.editar'],
            ['idpermiso' => 4, 'descripcion' => 'roles.ver'],
            ['idpermiso' => 5, 'descripcion' => 'permisos.ver'],
            ['idpermiso' => 6, 'descripcion' => 'cuentas.ver'],
            ['idpermiso' => 7, 'descripcion' => 'cuentas.editar'],
            ['idpermiso' => 8, 'descripcion' => 'asientos.ver'],
            ['idpermiso' => 9, 'descripcion' => 'asientos.editar'],
            ['idpermiso' => 10,'descripcion' => 'reportes.ver'],
        ]);
    }
}


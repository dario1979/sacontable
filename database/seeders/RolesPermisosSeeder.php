<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesPermisosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles_permisos')->delete();

        // ADMIN: todos los permisos
        $permisosAdmin = DB::table('permisos')->pluck('idpermiso')->all();
        $rows = [];

        foreach ($permisosAdmin as $pid) {
            $rows[] = ['rol_id' => 1, 'permiso_id' => $pid];
        }

        // USUARIO: solo ver (ejemplo)
        $permisosUsuario = [1, 6, 8, 10];
        foreach ($permisosUsuario as $pid) {
            $rows[] = ['rol_id' => 2, 'permiso_id' => $pid];
        }

        DB::table('roles_permisos')->insert($rows);
    }
}


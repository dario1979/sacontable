<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->truncate();

        DB::table('roles')->insert([
            ['idrol' => 1, 'descripcion' => 'ADMIN'],
            ['idrol' => 2, 'descripcion' => 'USUARIO'],
        ]);
    }
}

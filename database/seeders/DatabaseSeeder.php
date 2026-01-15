<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $this->call([
            RolesSeeder::class,
            PermisosSeeder::class,
            RolesPermisosSeeder::class,
            UsuariosSeeder::class,
            CuentasSeeder::class,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}


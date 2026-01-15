<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CuentasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cuentas')->truncate();

        DB::table('cuentas')->insert([
            [
                'idcuenta' => 1,
                'nombre' => 'CAJA',
                'nro_cuenta' => '101',
                'saldo_actual' => 0,
                'recibe_saldo' => 1,
                'tipo' => 'ACTIVO',
                'utilizada' => 'F',
                'eliminada' => 'F',
                'modificado' => 'F',
                'solo_admin' => 'T',
                'usuario_id' => 1,
                'id_padre' => null,
            ],
            [
                'idcuenta' => 2,
                'nombre' => 'VENTAS',
                'nro_cuenta' => '401',
                'saldo_actual' => 0,
                'recibe_saldo' => 1,
                'tipo' => 'RESULTADO',
                'utilizada' => 'F',
                'eliminada' => 'F',
                'modificado' => 'F',
                'solo_admin' => 'T',
                'usuario_id' => 1,
                'id_padre' => null,
            ],
        ]);
    }
}


<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Permisos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('permisos')->insert([
            [
                'permiso' => 'Crear usuario',
                'created_at' => $now
            ],
            [
                'permiso' => 'Editar usuario',
                'created_at' => $now
            ],
            [
                'permiso' => 'Eliminar usuario',
                'created_at' => $now
            ],
            [
                'permiso' => 'Crear rol',
                'created_at' => $now
            ],
            [
                'permiso' => 'Editar rol',
                'created_at' => $now
            ],
            [
                'permiso' => 'Eliminar rol',
                'created_at' => $now
            ],
            [
                'permiso' => 'Crear categoría',
                'created_at' => $now
            ],
            [
                'permiso' => 'Editar categoría',
                'created_at' => $now
            ],
            [
                'permiso' => 'Eliminar categoría',
                'created_at' => $now
            ],
            [
                'permiso' => 'Crear entrada',
                'created_at' => $now
            ],
            [
                'permiso' => 'Editar entrada',
                'created_at' => $now
            ],
            [
                'permiso' => 'Eliminar entrada',
                'created_at' => $now
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('roles')->insert([
            [
                'nombre' => 'Super Administrador',
                'created_at' => $now,
            ],
            [
                'nombre' => 'Administrador',
                'created_at' => $now,
            ],
            [
                'nombre' => 'Supervisor',
                'created_at' => $now,
            ],
            [
                'nombre' => 'Autor',
                'created_at' => $now,
            ],
            [
                'nombre' => 'Editor',
                'created_at' => $now,
            ],
            [
                'nombre' => 'Visitante',
                'created_at' => $now,
            ],
        ]);
    }
}

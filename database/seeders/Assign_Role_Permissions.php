<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Assign_Role_Permissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::all();

        foreach ($roles as $key => $rol) {
            switch ($rol->id) {
                // Superadmin
                case 1:
                    $premisos = Permission::all();
                    foreach ($premisos as $key => $permiso) {
                        DB::table('permiso_rol')->insert([
                            'role_id' => $rol->id,
                            'permission_id' => $permiso->id
                        ]);
                    }
                    break;
                // Administrador
                case 2:
                    $premisos = Permission::whereNotIn('id', [4, 5, 6])->get();
                    foreach ($premisos as $key => $permiso) {
                        DB::table('permiso_rol')->insert([
                            'role_id' => $rol->id,
                            'permission_id' => $permiso->id
                        ]);
                    }
                    break;
                // Supervisor
                case 3:
                    $premisos = Permission::whereNotIn('id', [1, 3, 4, 5, 6])->get();
                    foreach ($premisos as $key => $permiso) {
                        DB::table('permiso_rol')->insert([
                            'role_id' => $rol->id,
                            'permission_id' => $permiso->id
                        ]);
                    }
                    break;
                // Autor
                case 4:
                    $premisos = Permission::whereIn('id', [7,8, 10,11,12])->get();
                    foreach ($premisos as $key => $permiso) {
                        DB::table('permiso_rol')->insert([
                            'role_id' => $rol->id,
                            'permission_id' => $permiso->id
                        ]);
                    }
                    break;
                // Editor
                case 5:
                    $premisos = Permission::whereNotIn('id', [11])->get();
                    foreach ($premisos as $key => $permiso) {
                        DB::table('permiso_rol')->insert([
                            'role_id' => $rol->id,
                            'permission_id' => $permiso->id
                        ]);
                    }
                    break;
                    break;
                default:
                    # code...
                    break;
            }
        }
    }
}

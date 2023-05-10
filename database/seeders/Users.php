<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        User::create([
            'name' => 'Sebastian',
            'lastname' => 'Roldan',
            'email' => 'sebasroldanm@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('sebas123456'),
            'role_id' => 1,
            'last_online' => $now
        ]);

    }
}

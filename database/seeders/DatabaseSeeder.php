<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'admin',
                'name' => 'ini akun Admin',
                'email' => 'admin@example.com',
                'level' => 'admin',
                'password' => bcrypt('123456'),
            ],
            [
                'username' => 'mitra',
                'name' => 'ini akun User (non admin)',
                'email' => 'mitra@example.com',
                'level' => 'mitra',
                'password' => bcrypt('123456'),
            ],
            [
                'username' => 'perwakilan',
                'name' => 'ini akun User (non admin)',
                'email' => 'perwakilan@example.com',
                'level' => 'perwakilan',
                'password' => bcrypt('123456'),
            ],
            [
                'username' => 'pusat',
                'name' => 'ini akun User (non admin)',
                'email' => 'pusat@example.com',
                'level' => 'pusat',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}

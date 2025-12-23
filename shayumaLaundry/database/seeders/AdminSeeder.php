<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // buat role admin kalau belum ada
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // buat user admin
        $admin = User::updateOrCreate(
            ['email' => 'admin@shayuma.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin123'),
            ]
        );

        // assign role (INI YANG PENTING)
        $admin->assignRole($adminRole);
    }
}

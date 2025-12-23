<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class DefaultUserRole extends Seeder
{
    public function run(): void
    {
        // Reset cache permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // List permission
        $permissions = [
            'kelola layanan',
            'kelola order',
            'ubah status order',
            'lihat semua history',
            'buat order',
            'lihat order sendiri',
            'lihat resi',
        ];

        // Create permission (aman dijalankan berkali-kali)
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission],
                ['guard_name' => 'web']
            );
        }

        // Create role
        $admin = Role::firstOrCreate(
            ['name' => 'admin'],
            ['guard_name' => 'web']
        );

        $pelanggan = Role::firstOrCreate(
            ['name' => 'pelanggan'],
            ['guard_name' => 'web']
        );

        // Assign permission ke role
        $admin->syncPermissions([
            'kelola layanan',
            'kelola order',
            'ubah status order',
            'lihat semua history',
        ]);

        $pelanggan->syncPermissions([
            'buat order',
            'lihat order sendiri',
            'lihat resi',
        ]);
    }
}

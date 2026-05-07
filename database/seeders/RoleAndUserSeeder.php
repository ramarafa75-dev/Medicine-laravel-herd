<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleAndUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manager = Role::firstOrCreate(['name' => 'Manager']);
        $staff   = Role::firstOrCreate(['name' => 'Staff']);

        // Permission
        Permission::firstOrCreate(['name' => 'create medicines']);
        Permission::firstOrCreate(['name' => 'read medicines']);
        Permission::firstOrCreate(['name' => 'update medicines']);
        Permission::firstOrCreate(['name' => 'delete medicines']);
        Permission::firstOrCreate(['name' => 'edit medicines']);
        Permission::firstOrCreate(['name' => 'update stok']);
        Permission::firstOrCreate(['name' => 'view medicines']);

        $manager->givePermissionTo(['create medicines','read medicines','update medicines','delete medicines', 
        'edit medicines', 'view medicines']);
        $staff->givePermissionTo(['read medicines','update stok', 'view medicines', 'edit medicines']);

        $userManager = User::firstOrCreate(
            ['email' => 'manager@example.com'],
            ['name' => 'Manager User', 'password' => Hash::make('password')]
        );
        $userManager->assignRole('Manager');

        $userStaff = User::firstOrCreate(
            ['email' => 'staff@example.com'],
            ['name' => 'Staff User', 'password' => Hash::make('password')]
        );
        $userStaff->assignRole('Staff');
    }
}
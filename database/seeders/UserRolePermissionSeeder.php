<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_user_value = [
            'no_hp_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10)
        ];

        $buruh_tani = User::create(array_merge([
            'name' => 'buruh_tani',
            'no_hp' => 81,
        ], $default_user_value));

        $petani = User::create(array_merge([
            'name' => 'petani',
            'no_hp' => 82,
        ], $default_user_value));

        $admin = User::create(array_merge([
            'name' => 'admin',
            'no_hp' => 83,
        ], $default_user_value));

        $role_buruh_tani = Role::create(['name' => 'buruh tani']);
        $role_petani = Role::create(['name' => 'petani']);
        $role_admin = Role::create(['name' => 'admin']);

        Permission::create(['name' => 'petani post']);
        Permission::create(['name' => 'read petani konfigurasi']);
        Permission::create(['name' => 'admin']);

        $role_petani->givePermissionTo(['petani post', 'read petani konfigurasi']);
        $role_admin->givePermissionTo('admin');

        $buruh_tani->assignRole('buruh tani');
        $petani->assignRole('petani');
        $admin->assignRole('admin');
    }
}

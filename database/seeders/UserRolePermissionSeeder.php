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
            'no_handphone_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10)
        ];

        $buruh_tani = User::create(array_merge([
            'name' => 'buruh_tani',
            'no_handphone' => '081',
            'no_rekening' => '32423421',
            'gender_id' => mt_rand(1,2)
        ], $default_user_value));

        $petani = User::create(array_merge([
            'name' => 'petani',
            'no_handphone' => '082',
            'no_rekening' => '8324231',
            'gender_id' => mt_rand(1,2)
        ], $default_user_value));

        $admin = User::create(array_merge([
            'name' => 'admin',
            'no_handphone' => '083',
            'no_rekening' => '3203211',
            'gender_id' => mt_rand(1,2)
        ], $default_user_value));

        $role_buruh_tani = Role::create(['name' => 'buruh tani']);
        $role_petani = Role::create(['name' => 'petani']);
        $role_admin = Role::create(['name' => 'admin']);

        Permission::create(['name' => 'buruh tani']);
        Permission::create(['name' => 'petani']);
        Permission::create(['name' => 'admin']);

        $role_buruh_tani->givePermissionTo('buruh tani');
        $role_petani->givePermissionTo('petani');
        $role_admin->givePermissionTo('admin');

        $buruh_tani->assignRole('buruh tani');
        $petani->assignRole('petani');
        $admin->assignRole('admin');
    }
}

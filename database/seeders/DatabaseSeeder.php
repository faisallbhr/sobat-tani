<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\User;
use App\Models\Category;
use App\Models\Vacancies;
use Illuminate\Database\Seeder;
use Database\Seeders\DashboardTableSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // $this->call([
        //     DashboardTableSeeder::class,
        // ]);

        // User::factory(5)->create();

        Category::create([
            'name' => 'Padi',
            'slug' =>'padi'
        ]);

        Category::create([
            'name' => 'Jagung',
            'slug' =>'jagung'
        ]);

        Gender::create([
            'name' => 'L',
        ]);

        Gender::create([
            'name' => 'P',
        ]);

        $this->call([UserRolePermissionSeeder::class]);
        
        Vacancies::factory(20)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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

        Post::factory(20)->create();

        $this->call([UserRolePermissionSeeder::class]);
    }
}

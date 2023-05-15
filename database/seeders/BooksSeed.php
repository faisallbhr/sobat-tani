<?php

namespace Database\Seeders;

use App\Models\BookKeeping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookKeeping::create([
            'user_id' => 2,
            'slug' => 'coba',
            'activity' => 'Beli pupuk',
            'cost' => '100000'
        ]);
    }
}

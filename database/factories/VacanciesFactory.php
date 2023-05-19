<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacancies>
 */
class VacanciesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' =>$this->faker->sentence(2),
            'category_id' => mt_rand(1,2),
            'user_id' => 2,
            'address_id' => 1101020039,
            'slug' =>$this->faker->slug(),
            'body' =>$this->faker->paragraph(mt_rand(2,8)),
            'work_duration' => 3,
            'salary' => mt_rand(10000,100000),
            'address_detail' => $this->faker->paragraph(mt_rand(1,2)),
        ];
    }
}

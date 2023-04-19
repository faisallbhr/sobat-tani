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
            'title' =>$this->faker->sentence(mt_rand(2,8)),
            'slug' =>$this->faker->slug(),
            'body' =>$this->faker->paragraph(mt_rand(2,8)),
            'salary' => mt_rand(10000,100000),
            'address' => $this->faker->paragraph(mt_rand(1,2)),
            'user_id' => 2,
            'category_id' => mt_rand(1,2),
        ];
    }
}

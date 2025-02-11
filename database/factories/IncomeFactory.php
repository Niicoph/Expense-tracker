<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Income>
 */
class IncomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' =>  User::factory()->create()->id,
            'category_id' =>    Category::factory()->create()->id,
            'title' => $this->faker->title(),
            'amount' => $this->faker->randomFloat(2, 1, 1000),
            'entry_date' => $this->faker->dateTime(),
        ];
    }
}

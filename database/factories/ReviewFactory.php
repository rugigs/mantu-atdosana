<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reviewer_id' => User::factory(),
            'user_id' => User::factory(),
            'body' => $this->faker->paragraph(),
            'rating' => $this->faker->numberBetween(0,10)
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name,
            'cpf' => $this->faker->unique()->numerify('###########'),
            'email' => $this->faker->unique()->email(),
            'password' => '$2y$10$/jQDGMbcGPJOW4.NySJ9BOawJRblvR4z1Gn6wyY5RHlwFoLk8WWhm', // password
            'active' => $this->faker->boolean
        ];

    }
}

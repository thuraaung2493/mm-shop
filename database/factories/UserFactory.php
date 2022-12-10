<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'activated_at' => now(),
            'is_customer' => false,
            'password' => bcrypt('testing1234'), // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's activate should be deactivated.
     *
     * @return static
     */
    public function deactivated()
    {
        return $this->state(fn (array $attributes) => [
            'activated_at' => null,
        ]);
    }
}

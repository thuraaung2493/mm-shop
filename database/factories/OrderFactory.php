<?php

namespace Database\Factories;

use App\Enums\OrderStatus;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'number' => fake()->uuid(),
            'user_id' => User::factory(),
            'total_price' => fake()->randomNumber(6),
            'total_quantity' => fake()->randomNumber(5),
            'status' => OrderStatus::PENDING,
        ];
    }

    /**
     * Indicate that the model's status should be confirmed.
     *
     * @return static
     */
    public function confirmed()
    {
        return $this->state(fn (array $attributes) => [
            'status' => OrderStatus::CONFIRMED,
        ]);
    }

    /**
     * Indicate that the model's status should be delivered.
     *
     * @return static
     */
    public function delivered()
    {
        return $this->state(fn (array $attributes) => [
            'status' => OrderStatus::DELIVERED,
        ]);
    }
}

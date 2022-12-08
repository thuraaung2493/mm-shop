<?php

namespace Database\Factories;

use App\Enums\ItemStatus;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $quantity = fake()->randomNumber(2);

        return [
            'name' => fake()->unique()->name(),
            'price' => fake()->randomNumber(4),
            'quantity' => $quantity,
            'status' => $quantity > 0 ? ItemStatus::INSTOCK : ItemStatus::OUTSTOCK,
            'subcategory_id' => Subcategory::factory(),
        ];
    }

    /**
     * Indicate that the model's status should be in-stock.
     *
     * @return static
     */
    public function inStock()
    {
        return $this->state(fn (array $attributes) => [
            'quantity' => fake()->numberBetween(1, 100),
            'status' => ItemStatus::INSTOCK,
        ]);
    }
    /**
     * Indicate that the model's status should be out-stock.
     *
     * @return static
     */
    public function outStock()
    {
        return $this->state(fn (array $attributes) => [
            'quantity' => 0,
            'status' => ItemStatus::OUTSTOCK,
        ]);
    }
}

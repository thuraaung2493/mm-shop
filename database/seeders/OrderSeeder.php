<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::factory(5)
            ->hasAttached(
                Item::factory()->count(3),
                [
                    'total_price' => fake()->randomNumber(6),
                    'total_quantity' => fake()->randomNumber(5),
                ]
            )
            ->create();

        Order::factory(5)
            ->hasAttached(
                Item::factory()->count(3),
                [
                    'total_price' => fake()->randomNumber(6),
                    'total_quantity' => fake()->randomNumber(5),
                ]
            )
            ->confirmed()
            ->create();

        Order::factory(5)
            ->hasAttached(
                Item::factory()->count(3),
                [
                    'total_price' => fake()->randomNumber(6),
                    'total_quantity' => fake()->randomNumber(5),
                ]
            )
            ->delivered()
            ->create();
    }
}

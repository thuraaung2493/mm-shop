<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(5)->has(
            Subcategory::factory(3)->has(
                Item::factory(3)
            )
        )->create();
        Category::factory(5)->has(
            Subcategory::factory(3)->has(
                Item::factory(2)->inStock()
            )
        )->create();
        Category::factory(5)->has(
            Subcategory::factory(2)->has(
                Item::factory(5)->outStock()
            )
        )->create();
    }
}

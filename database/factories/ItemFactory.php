<?php

namespace Database\Factories;

use App\Models\Item;
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

    protected $model = Item::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'quantity' => $this->faker->numberBetween(1, 100),
            'source' => $this->faker->word,
            'laser' => $this->faker->numberBetween(0, 10),
            'welding' => $this->faker->numberBetween(0, 1000),
            'assembly' => $this->faker->numberBetween(0, 500),
            'electric' => $this->faker->numberBetween(0, 300),
            'position' => $this->faker->unique()->numberBetween(0, 6)
        ];
    }
}

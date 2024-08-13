<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\ItemPart;
use App\Models\Part;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItemPart>
 */
class ItemPartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ItemPart::class;

    public function definition(): array
    {
        return [
            'item_id' => Item::factory(),
            'part_id' => Part::factory(),
        ];
    }
}

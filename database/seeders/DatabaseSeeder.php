<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Item;
use App\Models\ItemPart;
use App\Models\Part;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $items = Item::factory()->count(6)->create();
        $parts = Part::factory()->count(5)->create();

        foreach ($items as $item) {
            $randomParts = $parts->random(rand(0, 3));
            foreach ($randomParts as $part) {
                ItemPart::factory()->create([
                    'item_id' => $item->id,
                    'part_id' => $part->id,
                ]);
            }
        }
    }
}

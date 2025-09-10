<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run()
    {
        $tagIds = Tag::pluck('id')->toArray();

        Car::factory()->count(250)->create()->each(function ($car) use ($tagIds) {
            // Attach 1-3 random tags
            $randomTagIds = collect($tagIds)->shuffle()->take(rand(1, 3))->toArray();
            $car->tags()->attach($randomTagIds);
        });
    }
}

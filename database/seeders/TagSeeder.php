<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Hybride', 'Elektrisch', 'SUV', 'Sedan', 'Hatchback', 'Cabrio',
            'Sportwagen', 'Luxe', 'Economisch', 'Familie', 'Klassiek',
            'Terreinwagen', 'Compact', 'Groot', 'Zuinig', 'Snel',
            'Handgeschakeld', 'Automaat', 'Diesel', 'Benzine', '4x4',
            'Stationwagen', 'Pickup', 'Roadster', 'Coupe', 'Minivan',
            'Crossover', 'Convertible', 'Off-road', 'Performance',
            'Touring', 'Urban', 'Vintage', 'Modern', 'Custom',
            'Limited Edition', 'Electric Hybrid', 'Plug-in Hybrid',
            'Mild Hybrid', 'Full Electric', 'Hydrogen', 'Biofuel'
        ];

        foreach ($tags as $tagName) {
            Tag::firstOrCreate([
                'name' => $tagName,
            ], [
                'color' => substr(md5($tagName), 0, 6),
            ]);
        }
    }
}


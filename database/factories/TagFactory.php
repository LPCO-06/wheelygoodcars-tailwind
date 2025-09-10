<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    public function definition()
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

        return [
            'name' => $this->faker->unique()->randomElement($tags),
            'color' => '#' . substr(md5($this->faker->unique()->word), 0, 6),
        ];
    }
}

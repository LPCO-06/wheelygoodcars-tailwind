<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Car;
use App\Models\User;

class CarFactory extends Factory
{
    public function definition()
    {
        return [
            'license_plate' => $this->faker->unique()->regexify('[A-Z]{2}[0-9]{2}[A-Z]{2}'),
            'brand' => $this->faker->randomElement(['Toyota', 'Volkswagen', 'Ford', 'BMW', 'Mercedes', 'Audi']),
            'model' => $this->faker->randomElement(['F-150', 'Camry', 'Silverado', 'Wrangler', 'Outback', 'Altima', 'Model 3', 'Elantra', 'Sorento', 'Golf', 'CX-5', 'A4', '3 Series', 'C-Class', 'RDX', 'RX', 'XC60', '911', 'Mustang', 'Charger', 'Sierra', '1500', 'RAV4', 'Accord', 'Equinox', 'Grand Cherokee', 'Rogue', 'Forester', 'Tucson', 'Telluride', 'Tiguan', 'Mazda3', 'Q5', 'X5', 'GLC', 'MDX', 'ES', 'S60', 'Cayenne', 'Explorer', 'Traverse', 'Durango', 'Acadia', '2500', 'Highlander', 'CR-V', 'Murano', 'Crosstrek', 'Palisade', 'Sportage', 'Atlas', 'CX-9', 'A6', 'X3', 'GLE', 'TLX', 'IS', 'V60', 'Macan', 'Escape', 'Tahoe', 'Challenger', 'Yukon', '3500', 'Tacoma', 'Pilot', 'Titan', 'Impreza', 'Santa Fe', 'Carnival', 'Jetta', 'MX-5 Miata', 'Q7', '5 Series', 'E-Class', 'ILX', 'GX', 'S90', 'Panamera', 'Ranger', 'Colorado', 'Grand Caravan', 'Canyon', 'ProMaster', 'Tundra', 'Odyssey', 'Frontier', 'Ascent', 'Kona', 'K5', 'Passat', 'CX-30', 'A3', '4 Series', 'CLA', 'NSX', 'LC', 'C40', 'Taycan', 'Model X', 'Model Y', 'Ioniq 5', 'E-Tron', 'ID.4', 'Bolt EV', 'Mustang Mach-E', 'F-250', 'F-350', 'Silverado 1500', 'Silverado 2500', 'Silverado 3500', 'Ram 1500', 'Ram 2500', 'Ram 3500', 'Sierra 1500', 'Sierra 2500', 'Sierra 3500', 'Tacoma', 'Tundra', 'RAV4', 'Highlander', '4Runner', 'Sequoia', 'Land Cruiser', 'C-HR', 'Venza', 'Corolla', 'Prius', 'Camry', 'Avalon', 'Yaris', 'Mirai', 'Supra']),
            'image' => $this->faker->imageUrl(640, 480, 'cars', true),
            'price' => $this->faker->numberBetween(5000, 100000),
            'mileage' => $this->faker->numberBetween(1000, 300000),
            'seats' => $this->faker->numberBetween(2, 8),
            'doors' => $this->faker->randomElement([2, 3, 4, 5]),
            'production_year' => $this->faker->numberBetween(1990, now()->year),
            'weight' => $this->faker->numberBetween(800, 2500),
            'color' => $this->faker->colorName(),
            'sold_at' => $this->faker->optional(0.2)->dateTimeBetween('-1 year', 'now'),
            'views' => $this->faker->numberBetween(0, 10000),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}

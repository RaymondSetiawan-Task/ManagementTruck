<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Truck;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Truck>
 */
class TruckFactory extends Factory
{
    protected $model = Truck::class;

    public function definition()
    {
        return [
            'license_plate' => $this->faker->bothify('??-####'),
            'model' => $this->faker->word,
            'capacity' => $this->faker->numberBetween(1000, 20000),
            'exp_kir' => $this->faker->date(),
            'status' => $this->faker->randomElement(['Available', 'On Trip', 'Maintenance']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

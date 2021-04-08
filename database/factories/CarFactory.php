<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->lastName.' - Car',
            'slug' => $this->faker->slug,
            'doors' => $this->faker->numberBetween(1,5),
            'brand_id' => $this->faker->numberBetween(1,5),
            'passengers' => $this->faker->numberBetween(1,5),
            'luggage' => $this->faker->numberBetween(1,5),
            'min_age_to_take_rent' => $this->faker->numberBetween(18,25),
            'rent_amount' => $this->faker->numberBetween(1,5),
            'car_details' => $this->faker->text(120),
            'highest_speed' => $this->faker->numberBetween(100,200),
            'air_condition' => $this->faker->numberBetween(0,1),
            'added_by_user_id' => $this->faker->numberBetween(1,5),
        ];
    }
}

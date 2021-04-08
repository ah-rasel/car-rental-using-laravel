<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Slider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'car_id' => $this->faker->numberBetween(3,4),
            'slider_text' => $this->faker->text(40),
            'slider_image_path' => "/user/assets/img/4-2-car-png-hd.png",
        ];
    }
}

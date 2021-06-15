<?php

namespace Database\Factories;

use App\Models\Donee;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoneeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Donee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'age' => $this->faker->randomDigit(),
            'details' => '[{"wishlist": [{"id": 0,"name": "Suzette Hutchinson"},{"id": 1,"name": "Kimberley Sheppard"},{"id": 2,"name": "Rodriquez Wilson"}]}]'
        ];
    }
}

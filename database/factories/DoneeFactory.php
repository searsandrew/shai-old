<?php

namespace Database\Factories;

use App\Models\Donee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name = $this->faker->name();

        return [
            'name' => $name,
            'description' => $this->faker->sentence(),
            'slug' => Str::slug($name . '-' . Str::random(8), '-'),
        ];
    }
}

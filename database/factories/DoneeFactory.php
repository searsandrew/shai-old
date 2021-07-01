<?php

namespace Database\Factories;

use App\Models\Donee;
use App\Models\Family;
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
        $gender = $this->faker->randomElement(['male', 'male', 'female', 'female', 'transgender', 'undeclared']);
        $name = $this->faker->firstName($gender);

        return [
            'firstname' => $name,
            'family_id' => Family::inRandomOrder()->first()->id,
            'description' => $this->faker->sentence(),
            'slug' => Str::slug($name . '-' . Str::random(8), '-'),
            'age' => $this->faker->randomDigitNotNull(),
            'gender' => $gender,
        ];
    }
}

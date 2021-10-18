<?php

namespace Database\Factories;

use App\Models\Donee;
use App\Models\Family;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
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
        $family = Family::inRandomOrder()->first();
        $gender = $this->faker->randomElement(['male', 'male', 'female', 'female', 'transgender', 'undeclared']);
        $firstname = $this->faker->firstName($gender);
        $lastname = Arr::random([$family->name, $family->name, $family->name, $this->faker->lastName()]);

        return [
            'firstname' => $firstname,
            'family_id' => $family->id,
            'lastname' => $lastname,
            'description' => $this->faker->sentence(),
            'slug' => Str::slug($firstname . '-' . Str::random(8), '-'),
            'age' => $this->faker->randomDigitNotNull(),
            'gender' => $gender,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Campaign;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CampaignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Campaign::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'description' => $this->faker->text(),
            'design' => '{"strap":false,"priced":"pink"}',
            'started_at' => $this->faker->date(),
            'ended_at' => $this->faker->date(),
            'slug' => Str::slug($name . '-' . Str::random(8), '-'),
        ];
    }
}

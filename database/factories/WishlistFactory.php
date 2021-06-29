<?php

namespace Database\Factories;

use App\Models\Campaign;
use App\Models\Donee;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Factories\Factory;

class WishlistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Wishlist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'donee_id' => Donee::inRandomOrder()->first()->id,
            'campaign_id' => Campaign::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'wishlist' => $this->faker->text(),
            'status' => $this->faker->randomElement(['unfilled', 'selected', 'completed', 'retracted']),
        ];
    }
}

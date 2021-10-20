<?php

namespace Database\Factories;

use App\Models\Campaign;
use App\Models\Donee;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $donee = Donee::inRandomOrder()->first();

        return [
            'slug' => Str::slug($donee->firstname . '-' . Str::random(8), '-'),
            'donee_id' => $donee->id,
            'campaign_id' => Campaign::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'wishlist' => $this->faker->text(),
            'status' => $this->faker->randomElement(['unfilled', 'selected', 'completed', 'retracted']),
        ];
    }
}

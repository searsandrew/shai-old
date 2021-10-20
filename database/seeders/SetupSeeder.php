<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Campaign;
use App\Models\Donee;
use App\Models\Family;
use App\Models\User;
use App\Models\Wishlist;

class SetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)->create();
        Campaign::factory()->count(2)->create();
        Family::factory()->count(5)->create();
        Donee::factory()->count(20)->create();
        Wishlist::factory()->count(20)->create();
    }
}

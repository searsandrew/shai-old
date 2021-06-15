<?php

namespace Tests\Feature;

use App\Models\Donee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class DoneeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_donee_index_can_be_generated()
    {
        $donee = Donee::all();
        $this->assertIsObject($donee);
    }

    public function test_donee_create_screen_can_be_rendered()
    {
        if (! Route::has('donee.create')) {
            return $this->markTestSkipped('Donee creation not enabled.');
        }

        $user = User::factory()->create();
        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->get('/');

        $response = $this->get(route('donee.create'));

        $response->assertStatus(200);
    }

    public function test_donee_show_screen_can_be_rendered()
    {
        if (! Route::has('donee.show')) {
            return $this->markTestSkipped('Donee showing not enabled.');
        }

        $user = User::factory()->create();
        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->get('/');

        $donee = Donee::factory()->create();
        $response = $this->get(route('donee.show', $donee));

        $response->assertStatus(200);
    }

    public function test_donee_edit_screen_can_be_rendered()
    {
        if (! Route::has('donee.edit')) {
            return $this->markTestSkipped('Donee editing not enabled.');
        }

        $user = User::factory()->create();
        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->get('/');

        $donee = Donee::factory()->create();
        $response = $this->get(route('donee.edit', $donee));

        $response->assertStatus(200);
    }
}

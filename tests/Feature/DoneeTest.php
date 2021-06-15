<?php

namespace Tests\Feature;

use App\Models\Donee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DoneeTest extends TestCase
{
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

    public function test_donee_list_is_generated()
    {
        $donee = Donee::all();
        $this->assertIsObject($donee);
    }
}

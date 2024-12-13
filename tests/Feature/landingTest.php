<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class landingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_landing()
    {
        $response = $this->get('/detail');

        $response->assertStatus(200);
    }
}

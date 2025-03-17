<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_returns_a_successful_response()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(200);
    }
}

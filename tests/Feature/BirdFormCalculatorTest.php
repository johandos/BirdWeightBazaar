<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BirdFormCalculatorTest extends TestCase
{
    public function testCalculateBirdsEndpoint()
    {
        $response = $this->json('POST', '/calculate-birds', [
            'available_weights' => [3, 2, 1],
            'requested_amount' => 5,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'result' => [3, 2],
            ]);
    }
}

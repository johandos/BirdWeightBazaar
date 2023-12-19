<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CalculatorControllerTest extends TestCase
{
    public function testCalculateMinimumBirds() {
        $response = $this->postJson('/api/birds/minimum', [
            'cases' => [
                '2,3:6',
                '1,2:5'
            ]
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'results' => [
                    '2:3,3',
                    '3:1,2,2'
                ]
            ]);
    }
}

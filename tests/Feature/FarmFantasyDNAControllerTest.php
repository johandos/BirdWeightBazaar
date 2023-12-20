<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FarmFantasyDNAControllerTest extends TestCase {
    use RefreshDatabase;

    public function testModifyAndHash() {
        // Simular los archivos y su contenido inicial
        file_put_contents('ChocoboRojo', '');
        file_put_contents('ChocoboAmarillo', '');

        $response = $this->postJson('/api/chocobo-dna/modify-and-hash', [
            'filename' => 'ChocoboRojo',
            'modifications' => [
                '0 115',
                '0 102'
            ]
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'results' => [
                    "ChocoboRojo 1: 1B0ECF0B",
                    "ChocoboRojo 2: BB72FE58"
                ]
            ]);

        // Probando otro archivo
        $response = $this->postJson('/api/chocobo-dna/modify-and-hash', [
            'filename' => 'ChocoboAmarillo',
            'modifications' => [
                '2 98',
                '4 50'
            ]
        ]);

        $response
            ->assertStatus(500);
    }
}

<?php

namespace Tests\Unit\Services;

use App\Services\BirdService;
use PHPUnit\Framework\TestCase;

class BirdServiceTest extends TestCase {
    private BirdService $birdService;

    protected function setUp(): void {
        parent::setUp();
        $this->birdService = new BirdService();
    }

    public function testCalculateMinimumBirds() {
        $this->assertEquals(
            ['count' => 2, 'birds' => [3, 3]],
            $this->birdService->calculateMinimumBirds([2, 3], 6),
            "Case 1: Weights [2, 3] and Target 6"
        );

        $this->assertEquals(
            ['count' => 3, 'birds' => [1, 2, 2]],
            $this->birdService->calculateMinimumBirds([1, 2], 5),
            "Case 2: Weights [1, 2] and Target 5"
        );
    }
}

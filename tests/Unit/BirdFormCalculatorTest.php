<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class BirdFormCalculatorTest extends TestCase
{
    public function testCalculateBirdsForAmount()
    {
        $availableWeights = [3, 2, 1];

        $result = BirdFormCalculator::calculateBirdsForAmount($availableWeights, 5);

        $this->assertEquals([3, 2], $result);
    }

    public function testCalculateBirds()
    {
        $availableWeights = [3, 2, 1];
        $requestedAmounts = [5, 4, 3];

        $result = GalliformeCalculator::calculateBirds($availableWeights, $requestedAmounts);

        $this->assertEquals(['5:3,2', '4:3,1', '3:3'], $result);
    }
}

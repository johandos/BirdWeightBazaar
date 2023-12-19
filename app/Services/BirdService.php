<?php

namespace App\Services;

class BirdService {
    /**
     * Calculates the minimum number of birds to reach a target weight.
     *
     * @param array $weights The weights of available birds.
     * @param int $target The target weight to achieve.
     * @return array count and weights of the birds used.
     */
    public function calculateMinimumBirds(array $weights, int $target): array
    {
        $result = $this->findMinBirds($weights, $target);
        return ['count' => count($result), 'birds' => $result];
    }

    /**
     * Finds the minimum combination of birds to reach the target weight.
     *
     * @param array $weights The weights of available birds.
     * @param int $desiredWeight The target weight to achieve.
     * @return array List of weights of birds used.
     */
    private function findMinBirds(array $weights, int $desiredWeight): array
    {
        $minBirdsCount = array_fill(0, $desiredWeight + 1, PHP_INT_MAX);
        $minBirdsCount[0] = 0;

        for ($i = 1; $i <= $desiredWeight; $i++) {
            foreach ($weights as $w) {
                if ($i >= $w && $minBirdsCount[$i - $w] != PHP_INT_MAX) {
                    $minBirdsCount[$i] = min($minBirdsCount[$i], $minBirdsCount[$i - $w] + 1);
                }
            }
        }

        $finalWeights = [];
        if ($minBirdsCount[$desiredWeight] != PHP_INT_MAX) {
            for ($remainingWeight = $desiredWeight; $remainingWeight > 0; ) {
                foreach ($weights as $w) {
                    if ($remainingWeight >= $w && $minBirdsCount[$remainingWeight] == $minBirdsCount[$remainingWeight - $w] + 1) {
                        $finalWeights[] = $w;
                        $remainingWeight -= $w;
                        break;
                    }
                }
            }
        }

        return $finalWeights;
    }
}

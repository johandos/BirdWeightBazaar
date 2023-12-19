<?php

namespace App\Http\Controllers;

use App\Services\BirdService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    protected BirdService $birdService;

    public function __construct(BirdService $birdService) {
        $this->birdService = $birdService;
    }

    public function calculateMinimumBirds(Request $request): JsonResponse
    {
        $data = $request->validate([
            'cases' => 'required|array',
        ]);

        $results = [];
        foreach ($data['cases'] as $case) {
            list($weights, $target) = explode(':', $case);
            $weights = explode(',', $weights);
            $result = $this->birdService->calculateMinimumBirds($weights, (int)$target);
            $results[] = $result['count'] . ':' . implode(',', $result['birds']);
        }

        return response()->json(['results' => $results]);
    }
}

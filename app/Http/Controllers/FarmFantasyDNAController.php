<?php

namespace App\Http\Controllers;

use App\Services\GeneticsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FarmFantasyDNAController extends Controller {
    protected GeneticsService $geneticsService;

    public function __construct(GeneticsService $geneticsService) {
        $this->geneticsService = $geneticsService;
    }

    public function modifyAndHash(Request $request): JsonResponse
    {
        $filename = $request->input('filename');
        $modifications = $request->input('modifications');

        $results = $this->geneticsService->modifyAndCalculateCRC32($filename, $modifications);

        return response()->json(['results' => $results]);
    }
}

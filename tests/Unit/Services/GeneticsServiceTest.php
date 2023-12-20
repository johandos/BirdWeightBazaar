<?php

namespace Tests\Unit\Services;

use App\Services\GeneticsService;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class GeneticsServiceTest extends TestCase {
    private GeneticsService $geneticsService;

    protected function setUp(): void {
        parent::setUp();
        Storage::fake('local');

        $this->geneticsService = new GeneticsService();
    }

    public function testModifyAndCalculateCRC32() {
        $filename = 'testChocobo';
        Storage::put($filename, '');

        // Modificaciones a realizar
        $modifications = [
            '0 115',
            '0 102'
        ];

        $results = $this->geneticsService->modifyAndCalculateCRC32($filename, $modifications);

        $this->assertEquals([
            "testChocobo 1: 1B0ECF0B",
            "testChocobo 2: BB72FE58"
        ], $results);
    }
}

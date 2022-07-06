<?php

namespace Tests\Unit\Services;


namespace Tests\Unit;

use App\Services\CandidatService;
use Tests\TestCase;

class CondidatServiceTest extends TestCase
{    
    /** @test */
    public function test_it_can_get_candidate_status_by_cin()
    {
        $candidatService = app(CandidatService::class);
        
        $candidatStatus = $candidatService->getCandidatStatusByCIN('Test');
        $this->assertNull($candidatStatus);

        $candidatStatus = $candidatService->getCandidatStatusByCIN('JE23');
        $this->assertNotNull($candidatStatus);
        $this->assertEquals((object)[
            "identifiant" => "4",
            "code" => "4",
            "libelle" => "موقوف للوفاة",
            "deleted" => "0",
            "id" => "4"
        ], $candidatStatus);
    }

    /** @test */
    public function test_it_can_check_if_candidate_is_active_by_cin()
    {
        $candidatService = app(CandidatService::class);
        
        $isActive = $candidatService->checkCandidatIsActiveByCIN('Test');
        $this->assertFalse($isActive);

        $isActive = $candidatService->checkCandidatIsActiveByCIN('JE23');
        $this->assertFalse($isActive);
    }
}
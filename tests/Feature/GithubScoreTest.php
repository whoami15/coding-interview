<?php

namespace Tests\Feature;

use App\Services\GithubScoreService;
use Tests\TestCase;

class GithubScoreTest extends TestCase
{
    public function test_calculate_github_score(): void
    {
        $githubScore = new GithubScoreService();
        $githubScore->calculate();

        $this->assertEquals(122, $githubScore->score);
    }
}

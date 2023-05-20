<?php

namespace App\Services;

use JsonException;

class GithubScoreService
{
    public function __construct(
        public int $score = 0,
    ) {
    }

    public function calculate(): int
    {
        $events = $this->loadJson();

        foreach ($events as $event) {
            match ($event['type']) {
                'PushEvent' => $this->score += 5,
                'PullRequestEvent' => $this->score += 4,
                'IssueCommentEvent' => $this->score += 3,
                'DeleteEvent' => $this->score += 2,
                default => $this->score += 1,
            };
        }

        return $this->score;
    }

    /**
     * @throws JsonException
     */
    public function loadJson(): array
    {
        try {
            return json_decode(file_get_contents(public_path('events.json')), $assoc = true, $depth = 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new JsonException($e->getCode().' error loading JSON file: '.$e->getMessage());
        }
    }
}

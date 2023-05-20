## GitHub Score

### Description

In this coding interview, your task is to calculate the GitHub score of a user based on a list of events stored in a JSON file. The events represent the public activities of the user on GitHub. Each event has an associated type, and each type has a specific score value assigned to it.

Use the following scoring system to calculate the GitHub score of a user:

| Event Type        | Score |
|-------------------|-------|
| PushEvent         | 5     |
| PullRequestEvent  | 4     |
| IssueCommentEvent | 3     |
| DeleteEvent       | 2     |
| Other Events      | 1     |

### Requirements

- Implement a PHP function named `calculate` that takes the path to a JSON file as input.
- Calculate the GitHub score for the user based on the events in the JSON file.
- Parse the JSON file contents and iterate over the events to calculate the GitHub score.
- Return the `total` GitHub score as the output of the function.
- Your solution should handle scenarios where the JSON file is empty or does not exist.

### Test Case

```php
$githubScore = new GithubScoreService();
$githubScore->calculate(); // call calculate method
$githubScore->score; // 122
```

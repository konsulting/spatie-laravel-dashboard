<?php

namespace Spatie\LaravelDashboard\Console\Components\GitHub;

use Illuminate\Console\Command;
use Spatie\LaravelDashboard\Services\GitHub\GitHubApi;
use Illuminate\Support\Collection;
use Spatie\LaravelDashboard\Events\GitHub\TotalsFetched;

class FetchTotals extends Command
{
    protected $signature = 'dashboard:fetch-github-totals';

    protected $description = 'Fetch GitHub totals';

    public function handle(GitHubApi $gitHub)
    {
        $userName = config('dashboard.services.github.username');

        $totals = $gitHub
            ->fetchPublicRepositories($userName)
            ->pipe(function (Collection $repos) use ($gitHub, $userName) {
                return [
                    'stars' => $repos->sum('stargazers_count'),
                    'issues' => $repos->sum('open_issues'),
                    'pullRequests' => $repos->sum(function ($repo) use ($gitHub, $userName) {
                        return count($gitHub->fetchPullRequests($userName, $repo['name']));
                    }),
                    'contributors' => $repos->sum(function ($repo) use ($gitHub, $userName) {
                        return count($gitHub->fetchContributors($userName, $repo['name']));
                    }),
                    'numberOfRepos' => $repos->count(),
                ];
            });

        event(new TotalsFetched($totals));
    }
}

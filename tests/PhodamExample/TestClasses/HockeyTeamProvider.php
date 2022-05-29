<?php

declare(strict_types=1);

namespace PhodamExampleTests\TestClasses;

use Phodam\Provider\TypeProviderInterface;
use PhodamExample\SportsTeam;

class HockeyTeamProvider implements TypeProviderInterface
{
    public function create(array $overrides = [])
    {
        $defaults = [
            'location' => $this->randomString(),
            'name' => $this->randomString(),
            'league' => 'NHL',
            'founded' => 1967
        ];
        $values = array_merge(
            $defaults,
            $overrides
        );

        return new SportsTeam(
            $values['location'],
            $values['name'],
            'NHL',
            $values['founded']
        );
    }

    private function randomString(): string
    {
        return substr(md5((string) rand(0, 10000)), 0, 10);
    }

}
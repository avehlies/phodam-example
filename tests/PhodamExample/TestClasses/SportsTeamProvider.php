<?php

declare(strict_types=1);

namespace PhodamExampleTests\TestClasses;

use Phodam\Provider\TypeProviderInterface;
use PhodamExample\SportsTeam;

class SportsTeamProvider implements TypeProviderInterface
{
    public function create(array $overrides = [])
    {
        $defaults = [
            'location' => $this->randomString(),
            'name' => $this->randomString(),
            'league' => $this->randomLeague(),
            'founded' => mt_rand(1800, (int) date('Y'))
        ];
        $values = array_merge(
            $defaults,
            $overrides
        );

        return new SportsTeam(
            $values['location'],
            $values['name'],
            $values['league'],
            $values['founded']
        );
    }

    private function randomString(int $length = 10): string
    {
        return substr(md5((string) rand(0, 10000)), 0, $length);
    }

    private function randomLeague(): string
    {
        return strtoupper($this->randomString(4));
    }

}
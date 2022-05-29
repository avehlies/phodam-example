<?php

declare(strict_types=1);

namespace PhodamExampleTests\TestClasses;

use Phodam\Provider\TypeProviderInterface;

class HockeyTeamFoundingYearProvider implements TypeProviderInterface
{
    public function create(array $overrides = [])
    {
        return rand(1920, (int) date('Y'));
    }

}
<?php

declare(strict_types=1);

namespace PhodamExampleTests\TestClasses;

use Phodam\Provider\TypeProviderInterface;

class SportsTeamYearTypeProvider implements TypeProviderInterface
{
    public function create(array $overrides = [])
    {
        $currentYear = (int) date('Y');
        return rand(1920, $currentYear);
    }

}
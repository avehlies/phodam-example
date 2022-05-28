<?php

declare(strict_types=1);

namespace PhodamExample\Tests\PhodamExample;

use Phodam\Phodam;
use Phodam\Provider\TypeProviderConfig;
use PhodamExample\SportsTeam;
use PhodamExample\Tests\PhodamExample\Phodam\HockeyTeamProvider;
use PhodamExample\Tests\PhodamExample\Phodam\SportsTeamYearTypeProvider;
use PHPUnit\Framework\TestCase;

class PhodamExampleTestCase extends TestCase
{
    public Phodam $phodam;

    public function setUp(): void
    {
        $this->phodam = new Phodam();

        $sportsTeamYearProvider = new SportsTeamYearTypeProvider();
        $sportsTeamYearProviderConfig =
            (new TypeProviderConfig($sportsTeamYearProvider))
                ->forInt()
                ->withName('FoundingYear');

        $this->phodam->registerTypeProviderConfig($sportsTeamYearProviderConfig);

        $hockeyTeamProvider = new HockeyTeamProvider();
        $hockeyTeamProviderConfig =
            (new TypeProviderConfig($hockeyTeamProvider))
                ->forClass(SportsTeam::class)
                ->withName('Hockey');

        $this->phodam->registerTypeProviderConfig($hockeyTeamProviderConfig);
    }
}
<?php

// This file is part of Phodam
// Copyright (c) Andrew Vehlies <avehlies@gmail.com>
// Licensed under the MIT license. See LICENSE file in the project root.
// SPDX-License-Identifier: MIT

declare(strict_types=1);

namespace PhodamExampleTests;

use Phodam\Phodam;
use Phodam\Provider\ProviderConfig;
use PhodamExample\SportsTeam;
use PhodamExampleTests\TestClasses\CreateReportArrayProvider;
use PhodamExampleTests\TestClasses\HockeyTeamFoundingYearProvider;
use PhodamExampleTests\TestClasses\HockeyTeamProvider;
use PhodamExampleTests\TestClasses\SportsTeamProvider;
use PhodamExampleTests\TestClasses\UuidStringProvider;
use PHPUnit\Framework\TestCase;

class PhodamExampleTestCase extends TestCase
{
    public Phodam $phodam;

    // by registering providers in a base TestCase class, values can be easily
    // created in any test with minimal code
    public function setUp(): void
    {
        $this->phodam = new Phodam();

        // register an Int provider named 'FoundingYear'
        // Usage: $this->phodam->create('int', 'FoundingYear')
        $sportsTeamYearProvider = new HockeyTeamFoundingYearProvider();
        $sportsTeamYearProviderConfig =
            (new ProviderConfig($sportsTeamYearProvider))
                ->forType('int')
                ->withName('FoundingYear');
        $this->phodam->registerProviderConfig($sportsTeamYearProviderConfig);

        // register a SportsTeam::class provider named 'Hockey'
        // Usage: $this->phodam->create(SportsTeam::class, 'Hockey')
        $hockeyTeamProvider = new HockeyTeamProvider();
        $hockeyTeamProviderConfig =
            (new ProviderConfig($hockeyTeamProvider))
                ->forType(SportsTeam::class)
                ->withName('Hockey');
        $this->phodam->registerProviderConfig($hockeyTeamProviderConfig);

        // register a SportsTeam::class provider without a name
        // Usage: $this->phodam->create(SportsTeam::class)
        $sportsTeamProvider = new SportsTeamProvider();
        $sportsTeamProviderConfig =
            (new ProviderConfig($sportsTeamProvider))
                ->forType(SportsTeam::class);
        $this->phodam->registerProviderConfig($sportsTeamProviderConfig);

        // register a String provider with the name 'uuid'
        // Usage: $this->phodam->createString('uuid')
        $uuidStringProvider = new UuidStringProvider();
        $uuidStringProviderConfig = (new ProviderConfig($uuidStringProvider))
            ->forType('string')
            ->withName('uuid');
        $this->phodam->registerProviderConfig($uuidStringProviderConfig);

        // register an Array provider with the name 'CreateReport'
        // Usage: $this->phodam->createArray('CreateReport')
        $createReportArrayProvider = new CreateReportArrayProvider();
        $createReportArrayProviderConfig =
            (new ProviderConfig($createReportArrayProvider))
                ->forArray()
                ->withName('CreateReport');
        $this->phodam->registerProviderConfig($createReportArrayProviderConfig);
    }
}
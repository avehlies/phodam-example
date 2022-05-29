<?php

// This file is part of Phodam
// Copyright (c) Andrew Vehlies <avehlies@gmail.com>
// Licensed under the MIT license. See LICENSE file in the project root.
// SPDX-License-Identifier: MIT

declare(strict_types=1);

namespace PhodamExampleTests;

use Phodam\Phodam;
use Phodam\Provider\TypeProviderConfig;
use PhodamExample\SportsTeam;
use PhodamExampleTests\TestClasses\CreateReportArrayProvider;
use PhodamExampleTests\TestClasses\HockeyTeamFoundingYearProvider;
use PhodamExampleTests\TestClasses\HockeyTeamProvider;
use PhodamExampleTests\TestClasses\SportsTeamProvider;
use PhodamExampleTests\TestClasses\StringProvider;
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
        // Usage: $this->phodam->createInt('FoundingYear')
        $sportsTeamYearProvider = new HockeyTeamFoundingYearProvider();
        $sportsTeamYearProviderConfig =
            (new TypeProviderConfig($sportsTeamYearProvider))
                ->forInt()
                ->withName('FoundingYear');
        $this->phodam->registerTypeProviderConfig($sportsTeamYearProviderConfig);

        // register a SportsTeam::class provider named 'Hockey'
        // Usage: $this->phodam->create(SportsTeam::class, 'Hockey')
        $hockeyTeamProvider = new HockeyTeamProvider();
        $hockeyTeamProviderConfig =
            (new TypeProviderConfig($hockeyTeamProvider))
                ->forClass(SportsTeam::class)
                ->withName('Hockey');
        $this->phodam->registerTypeProviderConfig($hockeyTeamProviderConfig);

        // register a SportsTeam::class provider without a name
        // Usage: $this->phodam->create(SportsTeam::class)
        $sportsTeamProvider = new SportsTeamProvider();
        $sportsTeamProviderConfig =
            (new TypeProviderConfig($sportsTeamProvider))
                ->forClass(SportsTeam::class);
        $this->phodam->registerTypeProviderConfig($sportsTeamProviderConfig);

        // register a String provider with the name 'uuid'
        // Usage: $this->phodam->createString('uuid')
        $uuidStringProvider = new UuidStringProvider();
        $uuidStringProviderConfig = (new TypeProviderConfig($uuidStringProvider))
            ->forString()
            ->withName('uuid');
        $this->phodam->registerTypeProviderConfig($uuidStringProviderConfig);

        // register a String provider without a name
        // Usage: $this->phodam->createString()
        $stringProvider = new StringProvider();
        $stringProviderConfig = (new TypeProviderConfig($stringProvider))
            ->forString();
        $this->phodam->registerTypeProviderConfig($stringProviderConfig);

        // register an Array provider with the name 'CreateReport'
        // Usage: $this->phodam->createArray('CreateReport')
        $createReportArrayProvider = new CreateReportArrayProvider();
        $createReportArrayProviderConfig =
            (new TypeProviderConfig($createReportArrayProvider))
                ->forArray()
                ->withName('CreateReport');
        $this->phodam->registerTypeProviderConfig($createReportArrayProviderConfig);
    }
}
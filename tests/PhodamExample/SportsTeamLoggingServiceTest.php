<?php

// This file is part of Phodam
// Copyright (c) Andrew Vehlies <avehlies@gmail.com>
// Licensed under the MIT license. See LICENSE file in the project root.
// SPDX-License-Identifier: MIT

declare(strict_types=1);

namespace PhodamExampleTests;

use PhodamExample\SportsTeam;
use PhodamExample\SportsTeamLoggingService;
use Psr\Log\LoggerInterface;

/**
 * @coversDefaultClass \PhodamExample\SportsTeamLoggingService
 */
class SportsTeamLoggingServiceTest extends PhodamExampleTestCase
{
    private LoggerInterface $logger;
    private SportsTeamLoggingService $service;

    private int $thisYear;

    public function setUp(): void
    {
        parent::setUp();

        $this->thisYear = (int) date('Y');

        $this->logger = $this->createMock(LoggerInterface::class);
        $this->service = new SportsTeamLoggingService($this->logger);
    }

    /**
     * @covers ::logLocation
     */
    public function testLogLocationForHockeyTeam(): void
    {
        $team = $this->phodam->create(SportsTeam::class, 'Hockey');

        $this->logger->expects($this->once())
            ->method('info')
            ->with('Location: ' . $team->getLocation());

        $this->service->logLocation($team);
    }

    /**
     * @covers ::logName
     */
    public function testLogNameForHockeyTeam(): void
    {
        $team = $this->phodam->create(SportsTeam::class, 'Hockey');

        $this->logger->expects($this->once())
            ->method('info')
            ->with('Name: ' . $team->getName());

        $this->service->logName($team);
    }

    /**
     * @covers ::logLeague
     */
    public function testLogLeague(): void
    {
        $team = $this->phodam->create(SportsTeam::class);

        $this->logger->expects($this->once())
            ->method('info')
            ->with('League: ' . $team->getLeague());

        $this->service->logLeague($team);
    }

    /**
     * @covers ::logLeague
     */
    public function testLogLeagueForHockeyTeam(): void
    {
        $team = $this->phodam->create(SportsTeam::class, 'Hockey');

        $this->logger->expects($this->once())
            ->method('info')
            ->with('League: NHL');

        $this->service->logLeague($team);
    }

    /**
     * @covers ::logFounded
     */
    public function testLogFoundedForHockeyTeam(): void
    {
        $team = $this->phodam->create(SportsTeam::class, 'Hockey');

        $this->logger->expects($this->once())
            ->method('info')
            ->with('Founded: ' . $team->getFounded());

        $this->service->logFounded($team);
    }

    /**
     * @covers ::logLeague
     */
    public function testAllGeneratedHockeyTeamsHaveNHLAsLeague(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $team = $this->phodam->create(SportsTeam::class, 'Hockey');
            $this->assertEquals('NHL', $team->getLeague());
        }
    }

    /**
     * @covers ::logLeague
     */
    public function testAllGeneratedSportsTeamsAreNotNHLTeams(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $team = $this->phodam->create(SportsTeam::class);
//            var_export($team);
            $this->assertNotEquals('NHL', $team->getLeague());
        }
    }

    /**
     * @covers ::logLeague
     */
    public function testAllGeneratedSportsTeamsCanHaveValuesOverridden(): void
    {
        $overrides = [
            'league' => 'EPL',
            'founded' => rand(1992, $this->thisYear)
        ];
        for ($i = 0; $i < 100; $i++) {
            $team = $this->phodam->create(SportsTeam::class, null, $overrides);
//            var_export($team);
            $this->assertEquals('EPL', $team->getLeague());
            $this->assertGreaterThanOrEqual(1992, $team->getFounded());
        }
    }

    /**
     * @covers ::logFounded
     */
    public function testAllGeneratedHockeyTeamsWithOverrides(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $year = $this->phodam->create('int', 'FoundingYear');
            $overrides = [
                'founded' => $year
            ];

            $team = $this->phodam->create(SportsTeam::class, 'Hockey', $overrides);

            $this->assertEquals('NHL', $team->getLeague());
            $this->assertGreaterThanOrEqual(1920, $team->getFounded());
            $this->assertLessThanOrEqual($this->thisYear, $team->getFounded());
        }
    }
}
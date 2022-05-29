<?php

// This file is part of Phodam
// Copyright (c) Andrew Vehlies <avehlies@gmail.com>
// Licensed under the MIT license. See LICENSE file in the project root.
// SPDX-License-Identifier: MIT

declare(strict_types=1);

namespace PhodamExample;

use Psr\Log\LoggerInterface;

class SportsTeamLoggingService
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function logLocation(SportsTeam $team): void
    {
        $this->logger->info('Location: ' . $team->getLocation());
    }

    public function logName(SportsTeam $team): void
    {
        $this->logger->info('Name: ' . $team->getName());
    }

    public function logLeague(SportsTeam $team): void
    {
        $this->logger->info('League: ' . $team->getLeague());
    }

    public function logFounded(SportsTeam $team): void
    {
        $this->logger->info('Founded: ' . $team->getFounded());
    }
}

<?php

// This file is part of Phodam
// Copyright (c) Andrew Vehlies <avehlies@gmail.com>
// Licensed under the MIT license. See LICENSE file in the project root.
// SPDX-License-Identifier: MIT

declare(strict_types=1);

namespace PhodamExampleTests\TestClasses;

use Phodam\PhodamAware;
use Phodam\PhodamAwareTrait;
use Phodam\Provider\ProviderInterface;
use PhodamExample\SportsTeam;

class SportsTeamProvider implements ProviderInterface, PhodamAware
{
    use PhodamAwareTrait;

    public function create(array $overrides = [], array $config = []): SportsTeam
    {
        $defaults = [
            'location' => $this->phodam->create('string'),
            'name' => $this->phodam->create('string'),
            'league' => strtoupper(substr($this->phodam->create('string'), 0, 4)),
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
}
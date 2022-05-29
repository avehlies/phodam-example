<?php

// This file is part of Phodam
// Copyright (c) Andrew Vehlies <avehlies@gmail.com>
// Licensed under the MIT license. See LICENSE file in the project root.
// SPDX-License-Identifier: MIT

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
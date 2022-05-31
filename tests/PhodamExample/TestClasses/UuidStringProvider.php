<?php

// This file is part of Phodam
// Copyright (c) Andrew Vehlies <avehlies@gmail.com>
// Licensed under the MIT license. See LICENSE file in the project root.
// SPDX-License-Identifier: MIT

declare(strict_types=1);

namespace PhodamExampleTests\TestClasses;

use Phodam\Provider\ProviderInterface;

/**
 * A very rudimentary UUID String Provider only to be used for unit tests
 */
class UuidStringProvider implements ProviderInterface
{
    public function create(array $overrides = [], array $config = []): string
    {
        $bytes = bin2hex(random_bytes(32));
        $uuid = vsprintf("%s%s-%s-%s-%s-%s%s%s%s", str_split($bytes, 4));
        $uuid[14] = '4';
        $possibleValues = ['8', '9', 'a', 'b'];
        $uuid[19] = $possibleValues[rand(0, 3)];
        return $uuid;
    }

}
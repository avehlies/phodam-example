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

class CreateReportArrayProvider implements ProviderInterface, PhodamAware
{
    use PhodamAwareTrait;

    public function create(array $overrides = [], array $config = []): array
    {
        $defaults = [
            'name' => $this->phodam->create('string'),
            'userId' => 1,
            'type' => 'CustomerReport',
            'scheduled' => 'daily',
            'fields' => [
                [
                    'name' => 'firstField'
                ],
                [
                    'name' => 'secondField'
                ]
            ]
        ];
        return array_merge(
            $defaults,
            $overrides
        );
    }
}
<?php

// This file is part of Phodam
// Copyright (c) Andrew Vehlies <avehlies@gmail.com>
// Licensed under the MIT license. See LICENSE file in the project root.
// SPDX-License-Identifier: MIT

declare(strict_types=1);

namespace PhodamExampleTests\TestClasses;

use Phodam\Provider\TypeProviderInterface;

class CreateReportArrayProvider implements TypeProviderInterface
{
    public function create(array $overrides = []): array
    {
        $defaults = [
            'name' => $this->randomString(),
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

    private function randomString(): string
    {
        return substr(md5((string) rand(0, 10000)), 0, 10);
    }

}
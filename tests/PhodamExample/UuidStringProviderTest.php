<?php

// This file is part of Phodam
// Copyright (c) Andrew Vehlies <avehlies@gmail.com>
// Licensed under the MIT license. See LICENSE file in the project root.
// SPDX-License-Identifier: MIT

declare(strict_types=1);

namespace PhodamExampleTests;

/**
 * @coversDefaultClass \PhodamExampleTests\TestClasses\UuidStringProvider
 */
class UuidStringProviderTest extends PhodamExampleTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @covers ::create
     */
    public function testCreate()
    {
        $uuids = [];
        for ($i = 0; $i < 50; $i++) {
            $uuid = $this->phodam->create('string', 'uuid');
            $uuids[] = $uuid;
//            var_export($uuid);
        }

        $uniqueUuids = array_unique($uuids);
        $this->assertEquals($uuids, $uniqueUuids, 'Not all UUIDs are unique!');
    }
}
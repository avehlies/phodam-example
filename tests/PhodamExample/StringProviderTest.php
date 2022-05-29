<?php

// This file is part of Phodam
// Copyright (c) Andrew Vehlies <avehlies@gmail.com>
// Licensed under the MIT license. See LICENSE file in the project root.
// SPDX-License-Identifier: MIT

declare(strict_types=1);

namespace PhodamExampleTests;

/**
 * @coversDefaultClass \PhodamExampleTests\TestClasses\StringProvider
 */
class StringProviderTest extends PhodamExampleTestCase
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
        $strings = [];
        for ($i = 0; $i < 50; $i++) {
            $string = $this->phodam->createString();
            $strings[] = $string;
//            var_export($string);
        }

        $uniqueStrings = array_unique($strings);
        $this->assertEquals($strings, $uniqueStrings, 'Not all strings are unique!');
    }
}
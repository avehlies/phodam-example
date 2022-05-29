<?php

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
            $uuid = $this->phodam->createString('uuid');
            $uuids[] = $uuid;
//            var_export($uuid);
        }

        $uniqueUuids = array_unique($uuids);
        $this->assertEquals($uuids, $uniqueUuids, 'Not all UUIDs are unique!');
    }
}
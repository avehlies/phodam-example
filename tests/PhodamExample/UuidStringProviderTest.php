<?php

declare(strict_types=1);

namespace PhodamExampleTests;

use Phodam\Provider\TypeProviderConfig;
use PhodamExampleTests\TestClasses\UuidStringProvider;

/**
 * @coversDefaultClass \PhodamExampleTests\TestClasses\UuidStringProvider
 */
class UuidStringProviderTest extends PhodamExampleTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $provider = new UuidStringProvider();
        $config = (new TypeProviderConfig($provider))
            ->forString()
            ->withname('uuid');

        $this->phodam->registerTypeProviderConfig($config);
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
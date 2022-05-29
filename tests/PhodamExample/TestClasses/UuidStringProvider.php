<?php

declare(strict_types=1);

namespace PhodamExampleTests\TestClasses;

use Phodam\Provider\TypeProviderInterface;

/**
 * A very rudimentary UUID String Provider only to be used for unit tests
 */
class UuidStringProvider implements TypeProviderInterface
{
    public function create(array $overrides = [])
    {
        $bytes = bin2hex(random_bytes(32));
        $uuid = vsprintf("%s%s-%s-%s-%s-%s%s%s%s", str_split($bytes, 4));
        $uuid[14] = '4';
        $possibleValues = ['8', '9', 'a', 'b'];
        $uuid[19] = $possibleValues[rand(0, 3)];
        return $uuid;
    }

}
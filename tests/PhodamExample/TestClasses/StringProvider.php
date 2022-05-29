<?php

declare(strict_types=1);

namespace PhodamExampleTests\TestClasses;

use Phodam\Provider\TypeProviderInterface;

/**
 * A general String provider, something like this would be built-in to Phodam
 */
class StringProvider implements TypeProviderInterface
{
    public function create(array $overrides = [])
    {
        $bytes = bin2hex(random_bytes(32));
        $strlen = rand(10, strlen($bytes));
        return substr($bytes, 0, $strlen);
    }

}
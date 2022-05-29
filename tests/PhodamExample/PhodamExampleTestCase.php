<?php

declare(strict_types=1);

namespace PhodamExampleTests;

use Phodam\Phodam;
use PHPUnit\Framework\TestCase;

class PhodamExampleTestCase extends TestCase
{
    public Phodam $phodam;

    public function setUp(): void
    {
        $this->phodam = new Phodam();
    }
}
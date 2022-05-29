<?php

declare(strict_types=1);

namespace PhodamExampleTests;

/**
 * An example for using array providers. Since PHP heavily uses Associative
 * Arrays, it's often necessary to generate an associative array in a certain
 * shape. One case could be generating a body of a POST request (CreateReport
 * in this case), or a response from an external API
 *
 * @coversDefaultClass \PhodamExampleTests\TestClasses\CreateReportArrayProvider
 */
class ReportApiTest extends PhodamExampleTestCase
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
        $postBody = $this->phodam->createArray('CreateReport');
        $this->assertEquals('CustomerReport', $postBody['type']);

        // $fakeApi->postReport($postBody);

        $postBodyForDifferentReport = $this->phodam->createArray(
            'CreateReport', ['type' => 'AdministratorReport']
        );
        $this->assertEquals(
            'AdministratorReport',
            $postBodyForDifferentReport['type']
        );
    }
}
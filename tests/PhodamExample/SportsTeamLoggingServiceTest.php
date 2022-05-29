<?php

declare(strict_types=1);

namespace PhodamExampleTests;

use Phodam\Provider\TypeProviderConfig;
use PhodamExample\SportsTeam;
use PhodamExample\SportsTeamLoggingService;
use PhodamExampleTests\TestClasses\HockeyTeamProvider;
use PhodamExampleTests\TestClasses\SportsTeamYearTypeProvider;
use Psr\Log\LoggerInterface;

/**
 * @coversDefaultClass \PhodamExample\SportsTeamLoggingService
 */
class SportsTeamLoggingServiceTest extends PhodamExampleTestCase
{
    private LoggerInterface $logger;
    private SportsTeamLoggingService $service;

    public function setUp(): void
    {
        parent::setUp();

        $this->logger = $this->createMock(LoggerInterface::class);
        $this->service = new SportsTeamLoggingService($this->logger);


        $sportsTeamYearProvider = new SportsTeamYearTypeProvider();
        $sportsTeamYearProviderConfig =
            (new TypeProviderConfig($sportsTeamYearProvider))
                ->forInt()
                ->withName('FoundingYear');

        $this->phodam->registerTypeProviderConfig($sportsTeamYearProviderConfig);

        $hockeyTeamProvider = new HockeyTeamProvider();
        $hockeyTeamProviderConfig =
            (new TypeProviderConfig($hockeyTeamProvider))
                ->forClass(SportsTeam::class)
                ->withName('Hockey');

        $this->phodam->registerTypeProviderConfig($hockeyTeamProviderConfig);
    }

    /**
     * @covers ::logLocation
     */
    public function testLogLocation(): void
    {
        $team = $this->phodam->create(SportsTeam::class, 'Hockey');

        $this->logger->expects($this->once())
            ->method('info')
            ->with('Location: ' . $team->getLocation());

        $this->service->logLocation($team);
    }

    /**
     * @covers ::logName
     */
    public function testLogName(): void
    {
        $team = $this->phodam->create(SportsTeam::class, 'Hockey');

        $this->logger->expects($this->once())
            ->method('info')
            ->with('Name: ' . $team->getName());

        $this->service->logName($team);
    }

    /**
     * @covers ::logLeague
     */
    public function testLogLeague(): void
    {
        $team = $this->phodam->create(SportsTeam::class, 'Hockey');

        $this->logger->expects($this->once())
            ->method('info')
            ->with('League: ' . $team->getLeague());

        $this->service->logLeague($team);
    }

    /**
     * @covers ::logFounded
     */
    public function testLogFounded(): void
    {
        $team = $this->phodam->create(SportsTeam::class, 'Hockey');

        $this->logger->expects($this->once())
            ->method('info')
            ->with('Founded: ' . $team->getFounded());

        $this->service->logFounded($team);
    }

    /**
     * @covers ::logLeague
     */
    public function testAllGeneratedHockeyTeamsHaveNHLAsLeague(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $team = $this->phodam->create(SportsTeam::class, 'Hockey');
            $this->assertEquals('NHL', $team->getLeague());
        }
    }

    /**
     * @covers ::logFounded
     */
    public function testAllGeneratedHockeyTeamsWithOverrides(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $year = $this->phodam->createInt('FoundingYear');
            $overrides = [
                'founded' => $year
            ];

            $team = $this->phodam->create(SportsTeam::class, 'Hockey', $overrides);

            $this->assertEquals('NHL', $team->getLeague());
            $this->assertGreaterThanOrEqual(1920, $team->getFounded());
            $this->assertLessThanOrEqual((int) date('Y'), $team->getFounded());
        }
    }
}
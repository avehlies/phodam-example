<?php

declare(strict_types=1);

namespace PhodamExample;

class SportsTeam
{
    private string $location;
    private string $name;
    private string $league;
    private int $founded;

    /**
     * @param string $location
     * @param string $name
     * @param string $league
     * @param int $founded
     */
    public function __construct(string $location, string $name, string $league, int $founded)
    {
        $this->location = $location;
        $this->name = $name;
        $this->league = $league;
        $this->founded = $founded;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location
     */
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLeague(): string
    {
        return $this->league;
    }

    /**
     * @param string $league
     */
    public function setLeague(string $league): void
    {
        $this->league = $league;
    }

    /**
     * @return int
     */
    public function getFounded(): int
    {
        return $this->founded;
    }

    /**
     * @param int $founded
     */
    public function setFounded(int $founded): void
    {
        $this->founded = $founded;
    }
}

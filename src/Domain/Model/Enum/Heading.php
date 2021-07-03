<?php

namespace App\Domain\Model\Enum;

use App\Domain\Exception\InvalidHeadingException;

class Heading
{
    public const NORTH = 'N';
    public const SOUTH = 'S';
    public const EAST = 'E';
    public const WEST = 'W';

    private const VALID_HEADINGS = [
        self::NORTH,
        self::SOUTH,
        self::EAST,
        self::WEST
    ];

    /** @var string */
    private $heading;

    /**
     * Heading constructor.
     * @param string $heading
     * @throws InvalidHeadingException
     */
    public function __construct(string $heading)
    {
        if (! in_array($heading, self::VALID_HEADINGS)) {
            throw new InvalidHeadingException();
        }

        $this->heading = $heading;
    }

    public function getHeading(): string
    {
        return $this->heading;
    }

    public function setHeading(string $heading): void
    {
        $this->heading = $heading;
    }
}

<?php

namespace App\Application\Dto;

class MowerDefinitionWithMovementsDto
{
    /** @var int */
    private $positionX;

    /** @var int */
    private $positionY;

    /** @var string */
    private $heading;

    /** @var string */
    private $movements;

    public function __construct(int $positionX, int $positionY, string $heading, string $movements)
    {
        $this->positionX = $positionX;
        $this->positionY = $positionY;
        $this->heading = $heading;
        $this->movements = $movements;
    }

    public function getPositionX(): int
    {
        return $this->positionX;
    }

    public function getPositionY(): int
    {
        return $this->positionY;
    }

    public function getHeading(): string
    {
        return $this->heading;
    }

    public function getMovements(): string
    {
        return $this->movements;
    }
}

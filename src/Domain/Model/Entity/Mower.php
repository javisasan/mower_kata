<?php

namespace App\Domain\Model\Entity;

use App\Domain\Model\Enum\Heading;
use App\Domain\Model\ValueObject\PositionValueObject;

class Mower
{
    /** @var PositionValueObject */
    private $position;

    /** @var Heading */
    private $heading;

    private function __construct(PositionValueObject $position, Heading $heading)
    {
        $this->position = $position;
        $this->heading = $heading;
    }

    public static function create(int $positionX, int $positionY, string $heading)
    {
        return new self(
            new PositionValueObject($positionX, $positionY),
            new Heading($heading)
        );
    }

    public function getPosition(): PositionValueObject
    {
        return $this->position;
    }

    public function getHeading(): string
    {
        return $this->heading->getHeading();
    }

    public function setHeading(string $heading): void
    {
        $this->heading = new Heading($heading);
    }

    public function toString(): string
    {
        return $this->getPosition()->getPositionX() . ' ' . $this->getPosition()->getPositionY() . ' ' . $this->getHeading();
    }
}

<?php

namespace App\Domain\Model\ValueObject;

use App\Domain\Exception\InvalidMowerPositionException;

class PositionValueObject
{
    /** @var int */
    private $positionX;

    /** @var int */
    private $positionY;

    /**
     * PositionValueObject constructor.
     * @param int $positionX
     * @param int $positionY
     * @throws InvalidMowerPositionException
     */
    public function __construct(int $positionX, int $positionY)
    {
        if ($positionX < 0 || $positionY < 0) {
            throw new InvalidMowerPositionException();
        }

        $this->positionX = $positionX;
        $this->positionY = $positionY;
    }

    /**
     * @return int
     */
    public function getPositionX(): int
    {
        return $this->positionX;
    }

    /**
     * @param int $positionX
     */
    public function setPositionX(int $positionX): void
    {
        $this->positionX = $positionX;
    }

    /**
     * @return int
     */
    public function getPositionY(): int
    {
        return $this->positionY;
    }

    /**
     * @param int $positionY
     */
    public function setPositionY(int $positionY): void
    {
        $this->positionY = $positionY;
    }
}

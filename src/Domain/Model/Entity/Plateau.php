<?php

namespace App\Domain\Model\Entity;

use App\Domain\Exception\InvalidPlateauBoundariesException;

class Plateau
{
    /** @var int */
    private $width;

    /** @var int */
    private $height;

    private function __construct(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public static function create(int $witdh, int $height)
    {
        if ($witdh <= 0 || $height <= 0) {
            throw new InvalidPlateauBoundariesException();
        }

        return new self($witdh, $height);
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }
}

<?php

namespace App\Application\Dto;

class PlateauDto
{
    /** @var int */
    private $witdh;

    /** @var int */
    private $height;

    public function __construct(int $witdh, int $height)
    {
        $this->witdh = $witdh;
        $this->height = $height;
    }

    public function getWitdh(): int
    {
        return $this->witdh;
    }

    public function getHeight(): int
    {
        return $this->height;
    }
}

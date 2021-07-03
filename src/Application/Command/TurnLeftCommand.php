<?php

namespace App\Application\Command;

use App\Domain\Command\MovementCommand;
use App\Domain\Model\Entity\Mower;

class TurnLeftCommand implements MovementCommand
{
    /** @var Mower */
    private $mower;

    public function __construct(Mower $mower)
    {
        $this->mower = $mower;
    }

    public function execute(): void
    {
        switch ($this->mower->getHeading()) {
            case 'N':
                $this->mower->setHeading('W');
                break;
            case 'S':
                $this->mower->setHeading('E');
                break;
            case 'E':
                $this->mower->setHeading('N');
                break;
            case 'W':
                $this->mower->setHeading('S');
                break;
        }
    }
}

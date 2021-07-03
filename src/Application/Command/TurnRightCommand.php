<?php

namespace App\Application\Command;

use App\Domain\Model\Entity\Mower;
use App\Domain\Command\MovementCommand;

class TurnRightCommand implements MovementCommand
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
                $this->mower->setHeading('E');
                break;
            case 'S':
                $this->mower->setHeading('W');
                break;
            case 'E':
                $this->mower->setHeading('S');
                break;
            case 'W':
                $this->mower->setHeading('N');
                break;
        }
    }
}

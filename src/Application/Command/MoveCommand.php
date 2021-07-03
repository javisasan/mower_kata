<?php

namespace App\Application\Command;

use App\Domain\Exception\MowerOutOfPlateauLimitsException;
use App\Domain\Model\Entity\Mower;
use App\Domain\Command\MovementCommand;
use App\Domain\Model\Entity\Plateau;

class MoveCommand implements MovementCommand
{
    /** @var Mower */
    private $mower;

    /** @var Plateau */
    private $plateau;

    public function __construct(Mower $mower, Plateau $plateau)
    {
        $this->mower = $mower;
        $this->plateau = $plateau;
    }

    /**
     * @throws MowerOutOfPlateauLimitsException
     */
    public function execute(): void
    {
        $mowerPosition = $this->mower->getPosition();

        switch ($this->mower->getHeading()) {
            case 'N':
                $mowerPosition->setPositionY($mowerPosition->getPositionY() + 1);
                break;
            case 'S':
                $mowerPosition->setPositionY($mowerPosition->getPositionY() - 1);
                break;
            case 'E':
                $mowerPosition->setPositionX($mowerPosition->getPositionX() + 1);
                break;
            case 'W':
                $mowerPosition->setPositionX($mowerPosition->getPositionX() - 1);
                break;
        }

        $this->checkPlateauLimits();
    }

    /**
     * @throws MowerOutOfPlateauLimitsException
     */
    private function checkPlateauLimits(): void
    {
        $outOfLimits = false;

        $mowerPosition = $this->mower->getPosition();

        if ($mowerPosition->getPositionX() > $this->plateau->getWidth() || $mowerPosition->getPositionY() > $this->plateau->getHeight()) {
            $outOfLimits = true;
        }

        if ($mowerPosition->getPositionX() < 0 || $mowerPosition->getPositionY() < 0) {
            $outOfLimits = true;
        }

        if ($outOfLimits) {
            throw new MowerOutOfPlateauLimitsException();
        }
    }
}

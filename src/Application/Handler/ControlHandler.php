<?php

namespace App\Application\Handler;

use App\Application\Dto\MowerDefinitionWithMovementsDto;
use App\Application\Dto\PlateauDto;
use App\Domain\Model\Entity\Plateau;

class ControlHandler
{
    /** @var Plateau */
    private $plateau;

    /** @var MowerControlHandler */
    private $mowerControlHandlers;

    public function __construct(PlateauDto $plateau)
    {
        $this->plateau = Plateau::create($plateau->getWitdh(), $plateau->getHeight());
    }

    public function addMowerWithMovements(MowerDefinitionWithMovementsDto $mowerDefinitionWithMovements): void
    {
        $this->mowerControlHandlers[] = new MowerControlHandler($this->plateau, $mowerDefinitionWithMovements);
    }

    public function run(): array
    {
        $output = [];

        foreach ($this->mowerControlHandlers as $controlHandler) {
            $output[] = $controlHandler->run();
        }

        return $output;
    }
}

<?php

namespace App\Application\Handler;

use App\Application\Command\MoveCommand;
use App\Application\Command\TurnLeftCommand;
use App\Application\Command\TurnRightCommand;
use App\Application\Dto\MowerDefinitionWithMovementsDto;
use App\Domain\Model\Entity\Mower;
use App\Domain\Model\Entity\Plateau;

class MowerControlHandler
{
    /** @var Plateau */
    private $plateau;

    /** @var Mower */
    private $mower;

    /** @var array */
    private $commands;

    public function __construct(Plateau $plateau, MowerDefinitionWithMovementsDto $mowerDefinition)
    {
        $this->commands = [];
        $this->plateau = $plateau;
        $this->mower = Mower::create($mowerDefinition->getPositionX(), $mowerDefinition->getPositionY(), $mowerDefinition->getHeading());
        $this->generageCommandsFromMovements($mowerDefinition->getMovements());
    }

    public function run(): string
    {
        foreach ($this->commands as $command) {
            $command->execute();
        }

        return $this->mower->toString();
    }

    private function generageCommandsFromMovements(string $movements): void
    {
        foreach(str_split($movements) as $movement) {
            switch ($movement) {
                case 'L':
                    $this->commands[] = new TurnLeftCommand($this->mower);
                    break;
                case 'R':
                    $this->commands[] = new TurnRightCommand($this->mower);
                    break;
                case 'M':
                    $this->commands[] = new MoveCommand($this->mower, $this->plateau);
                    break;
            }
        }
    }
}

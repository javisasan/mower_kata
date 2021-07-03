<?php

namespace App\Infrastructure\UserInterface;

use App\Application\Dto\MowerDefinitionWithMovementsDto;
use App\Application\Dto\PlateauDto;
use App\Application\Handler\ControlHandler;

class FromFileMowerController
{
    private const DEFAULT_FILE = 'INPUT_TEST_CASE.txt';

    /** @var string */
    private $file;

    public function __construct(string $file = null)
    {
        $this->file = !empty($file) ? $file : self::DEFAULT_FILE;
    }

    public function execute(): string
    {
        $fileLines = $this->readFile();

        $plateauDto = $this->getPlateauFromFile(array_shift($fileLines));

        $mowerDefinitionWithMovementsList = $this->getMowerDefinitionWithMovementsList($fileLines);

        $controlHandler = new ControlHandler($plateauDto);
        foreach ($mowerDefinitionWithMovementsList as $mowerDefinitionWithMovements) {
            $controlHandler->addMowerWithMovements($mowerDefinitionWithMovements);
        }

        return $controlHandler->run();
    }

    private function readFile(): array
    {
        $fh = fopen($this->file, 'r');

        do {
            $line = fgets($fh);
            if (!empty($line)) {
                $lines[] = str_replace("\n", "", $line);
            }
        } while (!feof($fh));

        fclose($fh);

        return $lines;
    }

    private function getPlateauFromFile(string $line): PlateauDto
    {
        $plateauData = explode(' ', $line);
        return new PlateauDto(intval($plateauData[0]), intval($plateauData[1]));
    }

    private function getMowerDefinitionWithMovementsList(array $fileLines): array
    {
        $mowerDefinitionWithMovementsList = [];

        do {
            $mowerData = explode(' ', array_shift($fileLines));
            $movements = array_shift($fileLines);
            $mowerDefinitionWithMovementsList[] = new MowerDefinitionWithMovementsDto($mowerData[0], $mowerData[1], $mowerData[2], $movements);
        } while (!empty($fileLines));

        return $mowerDefinitionWithMovementsList;
    }
}

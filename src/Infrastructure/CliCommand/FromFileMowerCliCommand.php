<?php

namespace App\Infrastructure\CliCommand;

use App\Application\Dto\MowerDefinitionWithMovementsDto;
use App\Application\Dto\PlateauDto;
use App\Application\Handler\ControlHandler;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

class FromFileMowerCliCommand
{
    /** @var string */
    private $file;

    public function __construct(string $file)
    {
        $this->file = $file;
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

        $output = $controlHandler->run();

        return join("\n", $output) . "\n";
    }

    /**
     * @return array
     * @throws FileNotFoundException
     */
    private function readFile(): array
    {
        if (!file_exists($this->file))
            throw new FileNotFoundException();

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

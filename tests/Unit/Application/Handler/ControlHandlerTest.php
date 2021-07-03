<?php

namespace Tests\Unit\Application\Handler;

use App\Application\Dto\MowerDefinitionWithMovementsDto;
use App\Application\Dto\PlateauDto;
use App\Application\Handler\ControlHandler;
use PHPUnit\Framework\TestCase;

class ControlHandlerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_input_test_case_1()
    {
        $plateauDto = new PlateauDto(5, 5);

        $firstMower = new MowerDefinitionWithMovementsDto(1, 2, 'N', 'LMLMLMLMM');
        $secondMower = new MowerDefinitionWithMovementsDto(3, 3, 'E', 'MMRMMRMRRM');

        $sut = new ControlHandler($plateauDto);
        $sut->addMowerWithMovements($firstMower);
        $sut->addMowerWithMovements($secondMower);

        $output = $sut->run();

        $expectedOutput = [
            '1 3 N',
            '5 1 E'
        ];

        $this->assertEquals($expectedOutput[0], $output[0]);
        $this->assertEquals($expectedOutput[1], $output[1]);
    }
}

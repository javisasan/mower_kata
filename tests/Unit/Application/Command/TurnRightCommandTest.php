<?php

namespace Tests\Unit\Application\Command;

use App\Application\Command\TurnRightCommand;
use App\Domain\Model\Entity\Mower;
use PHPUnit\Framework\TestCase;

class TurnRightCommandTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_can_turn_right_from_north()
    {
        $mower = Mower::create(0, 0, 'N');

        $sut = new TurnRightCommand($mower);

        $sut->execute();

        $this->assertEquals('E', $mower->getHeading());
    }

    public function test_can_turn_right_from_west()
    {
        $mower = Mower::create(0, 0, 'W');

        $sut = new TurnRightCommand($mower);

        $sut->execute();

        $this->assertEquals('N', $mower->getHeading());
    }

    public function test_can_turn_right_from_south()
    {
        $mower = Mower::create(0, 0, 'S');

        $sut = new TurnRightCommand($mower);

        $sut->execute();

        $this->assertEquals('W', $mower->getHeading());
    }

    public function test_can_turn_right_from_east()
    {
        $mower = Mower::create(0, 0, 'E');

        $sut = new TurnRightCommand($mower);

        $sut->execute();

        $this->assertEquals('S', $mower->getHeading());
    }
}

<?php

namespace Tests\Unit\Application\Command;

use App\Application\Command\TurnLeftCommand;
use App\Domain\Model\Entity\Mower;
use PHPUnit\Framework\TestCase;

class TurnLeftCommandTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_can_turn_left_from_north()
    {
        $mower = Mower::create(0, 0, 'N');

        $sut = new TurnLeftCommand($mower);

        $sut->execute();

        $this->assertEquals('W', $mower->getHeading());
    }

    public function test_can_turn_left_from_west()
    {
        $mower = Mower::create(0, 0, 'W');

        $sut = new TurnLeftCommand($mower);

        $sut->execute();

        $this->assertEquals('S', $mower->getHeading());
    }

    public function test_can_turn_left_from_south()
    {
        $mower = Mower::create(0, 0, 'S');

        $sut = new TurnLeftCommand($mower);

        $sut->execute();

        $this->assertEquals('E', $mower->getHeading());
    }

    public function test_can_turn_left_from_east()
    {
        $mower = Mower::create(0, 0, 'E');

        $sut = new TurnLeftCommand($mower);

        $sut->execute();

        $this->assertEquals('N', $mower->getHeading());
    }
}

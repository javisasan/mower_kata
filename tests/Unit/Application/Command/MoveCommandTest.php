<?php

namespace Tests\Unit\Application\Command;

use App\Application\Command\MoveCommand;
use App\Domain\Exception\MowerOutOfPlateauLimitsException;
use App\Domain\Model\Entity\Mower;
use App\Domain\Model\Entity\Plateau;
use PHPUnit\Framework\TestCase;

class MoveCommandTest extends TestCase
{
    /** @var Plateau */
    private $plateau;

    protected function setUp(): void
    {
        parent::setUp();

        $this->plateau = Plateau::create(5, 5);
    }

    public function test_movement_north()
    {
        $mower = Mower::create(1, 1, 'N');

//        print_r($mower->getPosition());die;

        $sut = new MoveCommand($mower, $this->plateau);

        $sut->execute();

        $this->assertEquals(1, $mower->getPosition()->getPositionX());
        $this->assertEquals(2, $mower->getPosition()->getPositionY());
    }

    public function test_movement_south()
    {
        $mower = Mower::create(1, 1, 'S');

        $sut = new MoveCommand($mower, $this->plateau);

        $sut->execute();

        $this->assertEquals(1, $mower->getPosition()->getPositionX());
        $this->assertEquals(0, $mower->getPosition()->getPositionY());
    }

    public function test_movement_east()
    {
        $mower = Mower::create(1, 1, 'E');

        $sut = new MoveCommand($mower, $this->plateau);

        $sut->execute();

        $this->assertEquals(2, $mower->getPosition()->getPositionX());
        $this->assertEquals(1, $mower->getPosition()->getPositionY());
    }

    public function test_movement_west()
    {
        $mower = Mower::create(1, 1, 'W');

        $sut = new MoveCommand($mower, $this->plateau);

        $sut->execute();

        $this->assertEquals(0, $mower->getPosition()->getPositionX());
        $this->assertEquals(1, $mower->getPosition()->getPositionY());
    }

    public function test_movement_fails_by_top_limit()
    {
        $this->expectException(MowerOutOfPlateauLimitsException::class);

        $mower = Mower::create(1, 5, 'N');

        $sut = new MoveCommand($mower, $this->plateau);

        $sut->execute();
    }

    public function test_movement_fails_by_right_limit()
    {
        $this->expectException(MowerOutOfPlateauLimitsException::class);

        $mower = Mower::create(5, 1, 'E');

        $sut = new MoveCommand($mower, $this->plateau);

        $sut->execute();
    }

    public function test_movement_fails_by_bottom_limit()
    {
        $this->expectException(MowerOutOfPlateauLimitsException::class);

        $mower = Mower::create(1, 0, 'S');

        $sut = new MoveCommand($mower, $this->plateau);

        $sut->execute();
    }

    public function test_movement_fails_by_left_limit()
    {
        $this->expectException(MowerOutOfPlateauLimitsException::class);

        $mower = Mower::create(0, 1, 'W');

        $sut = new MoveCommand($mower, $this->plateau);

        $sut->execute();
    }
}

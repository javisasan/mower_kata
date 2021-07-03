<?php

namespace Tests\Integration\Infrastructure;

use App\Infrastructure\UserInterface\FromFileMowerController;
use PHPUnit\Framework\TestCase;

class FromFileMowerControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_can_read_default_file()
    {
        $sut = new FromFileMowerController();

        $output = $sut->execute();

        $expectedOutput = "1 3 N\n5 1 E\n";

        $this->assertEquals($expectedOutput, $output);
    }
}
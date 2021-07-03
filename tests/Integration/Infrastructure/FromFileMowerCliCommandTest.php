<?php

namespace Tests\Integration\Infrastructure;

use App\Infrastructure\CliCommand\FromFileMowerCliCommand;
use PHPUnit\Framework\TestCase;

class FromFileMowerCliCommandTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_can_read_default_file()
    {
        $file = 'INPUT_TEST_CASE.txt';

        $sut = new FromFileMowerCliCommand($file);

        $output = $sut->execute();

        $expectedOutput = "1 3 N\n5 1 E\n";

        $this->assertEquals($expectedOutput, $output);
    }
}
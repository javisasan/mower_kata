<?php

namespace Tests;

use App\Dummy;
use PHPUnit\Framework\TestCase;

class DummyTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_dummy()
    {
        $this->dummy = new Dummy();

        $result = $this->dummy->execute();

        $this->assertTrue($result);
    }
}

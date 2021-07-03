<?php

namespace App\Domain\Command;

interface MovementCommand
{
    public function execute(): void;
}

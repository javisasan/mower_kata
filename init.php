<?php

use App\Infrastructure\CliCommand\FromFileMowerCliCommand;

require_once __DIR__ . '/vendor/autoload.php';

$file = 'INPUT_TEST_CASE.txt';

if (count($argv) == 2) {
    $file = $argv[1];
}

$fileController = new FromFileMowerCliCommand($file);
echo $fileController->execute();
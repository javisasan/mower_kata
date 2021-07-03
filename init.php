<?php

use App\Infrastructure\UserInterface\FromFileMowerController;

require_once __DIR__ . '/vendor/autoload.php';

$fileController = new FromFileMowerController('INPUT_TEST_CASE.txt');
echo $fileController->execute();

<?php

require __DIR__ . '/vendor/autoload.php';

use Game\Command\RunCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new RunCommand());
$application->run();
<?php

require 'vendor/autoload.php';

use App\Kernel;

$filter = $argv[1];
$params = array_slice($argv, 2);
$resourcePath = 'http://localhost:8000/offers';

$kernel = new Kernel($filter, $params);

$kernel->run($resourcePath);
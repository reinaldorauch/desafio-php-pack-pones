<?php

declare(strict_types=1);

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\EntityManager;

$container = require_once __DIR__ . '/app/bootstrap.php';

$em = $container->get(EntityManager::class);

return ConsoleRunner::createHelperSet($em);
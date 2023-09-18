<?php

use DI\Container;
use Swoole\WebSocket\Server;

require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/dotenv.php';

/** @var Container $container */
$container = require __DIR__ . '/di-container.php';

return $container->get(Server::class);

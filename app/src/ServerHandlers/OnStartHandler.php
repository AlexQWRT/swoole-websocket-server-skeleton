<?php

namespace App\ServerHandlers;

use App\Services\Server\OnStartHandlerInterface;
use DI\Container;
use Psr\Container\ContainerInterface;
use Swoole\WebSocket\Server;

class OnStartHandler implements OnStartHandlerInterface
{
    public function __construct(
        protected readonly Container $container
    ) {}

    public function handle(Server $server): void
    {
        $this->container->set(Server::class, $server);
        echo 'Started' . PHP_EOL;
    }
}
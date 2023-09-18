<?php

namespace App\Providers;

use App\Services\ConfigurationInterface;
use App\Services\ProviderInterface;
use Swoole\WebSocket\Server;

class WsServerProvider implements ProviderInterface
{

    /**
     * @inheritDoc
     */
    public function __invoke(): array
    {
        return [
            Server::class => function (ConfigurationInterface $configuration) {
                return new Server(
                    $configuration->get('app.host'),
                    $configuration->get('app.port')
                );
            },
        ];
    }
}
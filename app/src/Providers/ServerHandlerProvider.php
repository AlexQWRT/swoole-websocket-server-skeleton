<?php

namespace App\Providers;

use App\ServerHandlers\OnCloseHandler;
use App\ServerHandlers\OnMessageHandler;
use App\ServerHandlers\OnOpenHandler;
use App\ServerHandlers\OnStartHandler;
use App\Services\ProviderInterface;
use App\Services\Repositories\ClientRepositoryInterface;
use App\Services\Server\OnCloseHandlerInterface;
use App\Services\Server\OnMessageHandlerInterface;
use App\Services\Server\OnOpenHandlerInterface;
use App\Services\Server\OnStartHandlerInterface;
use DI\Container;

class ServerHandlerProvider implements ProviderInterface
{

    public function __invoke(): array
    {
        return [
            OnMessageHandlerInterface::class => function(ClientRepositoryInterface $clientRepository) {
                return new OnMessageHandler($clientRepository);
            },
            OnOpenHandlerInterface::class => function (ClientRepositoryInterface $clientRepository) {
                return new OnOpenHandler($clientRepository);
            },
            OnCloseHandlerInterface::class => function (ClientRepositoryInterface $clientRepository) {
                return new OnCloseHandler($clientRepository);
            },
            OnStartHandlerInterface::class => function (Container $container) {
                return new OnStartHandler($container);
            }
        ];
    }
}
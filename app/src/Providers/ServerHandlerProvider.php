<?php

namespace App\Providers;

use App\ServerHandlers\OnCloseHandler;
use App\ServerHandlers\OnMessageHandler;
use App\ServerHandlers\OnOpenHandler;
use App\Services\ProviderInterface;
use App\Services\Repositories\ClientRepositoryInterface;
use App\Services\ServerHandlers\OnCloseHandlerInterface;
use App\Services\ServerHandlers\OnMessageHandlerInterface;
use App\Services\ServerHandlers\OnOpenHandlerInterface;

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
        ];
    }
}
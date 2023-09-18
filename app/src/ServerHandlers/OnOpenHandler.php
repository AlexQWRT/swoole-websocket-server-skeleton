<?php

namespace App\ServerHandlers;

use App\Services\Repositories\ClientRepositoryInterface;
use App\Services\Server\OnOpenHandlerInterface;
use Swoole\Http\Request;
use Swoole\WebSocket\Server;

class OnOpenHandler implements OnOpenHandlerInterface
{
    protected const USER_ID_HEADER = 'x-user-id';

    public function __construct(
        protected readonly ClientRepositoryInterface $clientRepository
    )
    {
    }

    public function handle(Server $server, Request $request): void
    {
        if (array_key_exists(
            self::USER_ID_HEADER, $request->header)
            && is_string($userId = $request->header[self::USER_ID_HEADER])
        ) {
            $this->clientRepository->addClient($request->fd, $userId);
        } else {
            $this->clientRepository->addClient($request->fd, '');
        }

        echo "connection open: {$request->fd}\n";
    }
}
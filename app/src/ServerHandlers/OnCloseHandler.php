<?php

namespace App\ServerHandlers;

use App\Services\Repositories\ClientRepositoryInterface;
use App\Services\ServerHandlers\OnCloseHandlerInterface;
use Swoole\WebSocket\Server;

class OnCloseHandler implements OnCloseHandlerInterface
{
    public function __construct(
        protected readonly ClientRepositoryInterface $clientRepository
    )
    {
    }

    public function handle(Server $server, int $fd): void
    {
        $this->clientRepository->deleteClientByFd($fd);
        echo "connection close: {$fd}\n";
    }
}

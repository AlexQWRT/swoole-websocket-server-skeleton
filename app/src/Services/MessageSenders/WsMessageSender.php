<?php

namespace App\Services\MessageSenders;

use App\Services\Server\MessageSenderInterface;
use App\Services\Server\ResponseInterface;
use Swoole\WebSocket\Server;

class WsMessageSender implements MessageSenderInterface
{
    public function __construct(
        protected readonly Server $server
    ) {}

    public function send(ResponseInterface $response): void
    {
        $this->server->push(
            $response->getConnectionId(),
            $response->getMessage()
        );
    }
}
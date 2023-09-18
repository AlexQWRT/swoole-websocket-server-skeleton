<?php

namespace App\ServerHandlers;

use App\Services\Repositories\ClientRepositoryInterface;
use App\Services\ServerHandlers\OnMessageHandlerInterface;
use Swoole\WebSocket\Frame;
use Swoole\WebSocket\Server;

class OnMessageHandler implements OnMessageHandlerInterface
{
    public function __construct(
        protected readonly ClientRepositoryInterface $clientRepository
    )
    {
    }

    public function handle(Server $server, Frame $frame): void
    {
        $data = json_decode($frame->data, true) ?? [];

        if (array_key_exists('userId', $data)) {
            $fds = $this->clientRepository->getClientsFdsByUserId($data['userId']);
        } else {
            $fds = [$frame->fd];
        }

        foreach ($fds as $fd) {
            $server->push($fd, $frame->data);
        }
    }
}

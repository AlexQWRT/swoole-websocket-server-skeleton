<?php

namespace App\Services\ServerHandlers;

use Swoole\WebSocket\Server;

interface OnCloseHandlerInterface
{
    public function handle(Server $server, int $fd): void;
}

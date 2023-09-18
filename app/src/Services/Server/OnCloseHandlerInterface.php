<?php

namespace App\Services\Server;

use Swoole\WebSocket\Server;

interface OnCloseHandlerInterface
{
    public function handle(Server $server, int $fd): void;
}

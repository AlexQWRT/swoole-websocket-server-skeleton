<?php

namespace App\Services\Server;

use Swoole\WebSocket\Server;

interface OnStartHandlerInterface
{
    public function handle(Server $server): void;
}

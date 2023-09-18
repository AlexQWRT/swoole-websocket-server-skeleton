<?php

namespace App\Services\ServerHandlers;

use Swoole\WebSocket\Frame;
use Swoole\WebSocket\Server;

interface OnMessageHandlerInterface
{
    public function handle(Server $server, Frame $frame): void;
}
<?php

namespace App\Services\ServerHandlers;

use Swoole\Http\Request;
use Swoole\WebSocket\Server;

interface OnOpenHandlerInterface
{
    public function handle(Server $server, Request $request): void;
}
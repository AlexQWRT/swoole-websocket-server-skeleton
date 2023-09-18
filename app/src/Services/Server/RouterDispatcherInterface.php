<?php

namespace App\Services\Server;

interface RouterDispatcherInterface
{
    public function handle(RequestInterface $request): void;
}

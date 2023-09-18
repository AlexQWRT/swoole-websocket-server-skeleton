<?php

namespace App\Services\Server;

interface ActionInterface
{
    public function handle(RequestInterface $request): ResponseInterface;
}

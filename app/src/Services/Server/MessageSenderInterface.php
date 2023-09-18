<?php

namespace App\Services\Server;

interface MessageSenderInterface
{
    public function send(ResponseInterface $response): void;
}
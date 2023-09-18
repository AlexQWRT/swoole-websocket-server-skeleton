<?php

namespace App\Services\Server;

interface ResponseInterface
{
    public function getConnectionId(): int;

    public function getMessage(): string;

    /**
     * MUST return a new request instance without
     * modifying original object
     */
    public function withConnectionId(int $connectionId): static;

    /**
     * MUST return a new request instance without
     * modifying original object
     */
    public function withMessage(string $message): static;
}
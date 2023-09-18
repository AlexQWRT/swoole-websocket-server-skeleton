<?php

namespace App\Services\Responses;

use App\Services\Server\ResponseInterface;

class Response implements ResponseInterface
{
    public function __construct(
        protected readonly int $connectionId,
        protected readonly string $message
    ) {}

    public function getConnectionId(): int
    {
        return $this->connectionId;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @inheritDoc
     */
    public function withConnectionId(int $connectionId): static
    {
        return new self(
            $connectionId,
            $this->getMessage()
        );
    }

    /**
     * @inheritDoc
     */
    public function withMessage(string $message): static
    {
        return new self(
            $this->getConnectionId(),
            $message
        );
    }
}
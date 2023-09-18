<?php

namespace App\Services\Responses;

use App\Services\Server\ResponseInterface;
use JsonException;
use JsonSerializable;

class JsonResponse implements ResponseInterface
{
    protected ResponseInterface $baseResponse;

    /**
     * @throws JsonException
     */
    public function __construct(
        int $connectionId,
        JsonSerializable $data,
        ResponseInterface $baseResponse = null
    ) {
        $message = json_encode($data, JSON_THROW_ON_ERROR);

        if (null === $baseResponse) {
            $this->baseResponse = new Response(
                $connectionId,
                $message
            );
        } else {
            $this->baseResponse = $baseResponse
                ->withConnectionId($connectionId)
                ->withMessage($message);
        }
    }

    public function getConnectionId(): int
    {
        return $this->baseResponse->getConnectionId();
    }

    public function getMessage(): string
    {
        return $this->baseResponse->getMessage();
    }

    /**
     * @inheritDoc
     */
    public function withConnectionId(int $connectionId): static
    {
        return $this->baseResponse->withConnectionId($connectionId);
    }

    /**
     * @inheritDoc
     */
    public function withMessage(string $message): static
    {
        return $this->baseResponse->withMessage($message);
    }
}
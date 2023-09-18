<?php

namespace App\Services\Router;

use App\Services\Server\MessageSenderInterface;
use App\Services\Server\RequestInterface;
use App\Services\Server\RouterDispatcherInterface;
use App\Services\Server\RouterInterface;
use RuntimeException;
use JsonException;

class BaseRouterDispatcher implements RouterDispatcherInterface
{
    protected const NAME_FIELD = 'name';

    public function __construct(
        protected readonly RouterInterface        $router,
        protected readonly MessageSenderInterface $messageSender
    ) {}

    /**
     * @throws JsonException
     */
    public function handle(RequestInterface $request): void
    {
        $message = $request->getMessage();
        $json    = json_decode($message, true, flags: JSON_THROW_ON_ERROR);

        if (!array_key_exists(self::NAME_FIELD, $json)) {
            throw new RuntimeException(code: 400);
        }

        if (!is_string($json[self::NAME_FIELD])) {
            throw new RuntimeException(code: 400);
        }

        $routeName = $json[self::NAME_FIELD];

        $action = $this->router->match($routeName);

        $this->messageSender->send(
            $action->handle($request)
        );
    }
}
<?php

namespace App\Services\Router;

use App\Services\Server\ActionInterface;
use App\Services\Server\RouteInterface;

class BaseRoute implements RouteInterface
{
    public function __construct(
        protected readonly string $name,
        protected readonly ActionInterface $action
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getAction(): ActionInterface
    {
        return $this->action;
    }
}
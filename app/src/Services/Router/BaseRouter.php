<?php

namespace App\Services\Router;

use App\Services\Server\ActionInterface;
use App\Services\Server\RouteInterface;
use App\Services\Server\RouterInterface;

class BaseRouter implements RouterInterface
{
    protected array $routes;

    public function __construct(
        protected readonly ActionInterface $notFoundRoute,
        RouteInterface ...$routes
    )
    {
        $this->routes = $routes;
    }

    public function match(string $name): ActionInterface
    {
        foreach ($this->routes as $route) {
            if ($name === $route->getName()) {
                return $route->getAction();
            }
        }

        return $this->notFoundRoute;
    }

    public function addRoute(RouteInterface $route): static
    {
        $this->routes[] = $route;

        return $this;
    }
}
<?php

namespace App\Services\Server;

interface RouterInterface
{
    public function match(string $name): ActionInterface;

    public function addRoute(RouteInterface $route): static;
}

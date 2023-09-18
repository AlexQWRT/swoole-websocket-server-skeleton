<?php

namespace App\Services\Server;

interface RouteInterface
{
    public function getName(): string;

    public function getAction(): ActionInterface;
}

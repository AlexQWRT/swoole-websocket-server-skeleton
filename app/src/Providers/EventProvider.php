<?php

namespace App\Providers;

use App\Services\ProviderInterface;

class EventProvider implements ProviderInterface
{

    /**
     * @inheritDoc
     */
    public function __invoke(): array
    {
        return [

        ];
    }
}
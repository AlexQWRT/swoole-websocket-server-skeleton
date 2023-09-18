<?php

namespace App\Providers;

use App\Repositories\SwooleTableClientRepository;
use App\Services\ProviderInterface;
use App\Services\Repositories\ClientRepositoryInterface;

class RepositoriesProvider implements ProviderInterface
{

    public function __invoke(): array
    {
        return [
            ClientRepositoryInterface::class => function() {
                return new SwooleTableClientRepository();
            },
        ];
    }
}
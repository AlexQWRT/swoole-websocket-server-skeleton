<?php

namespace App\Providers;

use App\Repositories\ClientRepository;
use App\Services\ProviderInterface;
use App\Services\Repositories\ClientRepositoryInterface;

class RepositoriesProvider implements ProviderInterface
{

    public function __invoke(): array
    {
        return [
            ClientRepositoryInterface::class => function() {
                return new ClientRepository();
            },
        ];
    }
}
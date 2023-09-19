<?php

namespace App\Providers;

use App\Repositories\SwooleTableClientRepository;
use App\Services\ProviderInterface;
use App\Services\Repositories\ClientRepositoryInterface;
use Swoole\Table;

class RepositoriesProvider implements ProviderInterface
{

    public function __invoke(): array
    {
        return [
            ClientRepositoryInterface::class => function() {
                $table = new Table(pow(2, 30)); // allows to store 1073741824 rows
                $table->column(SwooleTableClientRepository::FD_COLUMN, Table::TYPE_INT, 64);
                $table->column(SwooleTableClientRepository::USER_ID_COLUMN, Table::TYPE_STRING, 256);
                $table->create();

                return new SwooleTableClientRepository($table);
            },
        ];
    }
}
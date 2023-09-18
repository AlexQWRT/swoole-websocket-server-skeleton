<?php

namespace App\Repositories;

use App\Services\Repositories\ClientRepositoryInterface;
use Generator;
use Swoole\Table;

class ClientRepository implements ClientRepositoryInterface
{
    protected readonly Table $table;
    protected const FD_COLUMN = 'fd';
    protected const USER_ID_COLUMN = 'userId';

    public function __construct()
    {
        $this->table = new Table(1024);
        $this->table->column(self::FD_COLUMN, Table::TYPE_INT, 64);
        $this->table->column(self::USER_ID_COLUMN, Table::TYPE_STRING, 256);
        $this->table->create();
    }

    public function addClient(int $fd, string $userId): void
    {
        $this->table->set($fd, [
            self::FD_COLUMN => $fd,
            self::USER_ID_COLUMN => $userId,
        ]);
    }

    /**
     * @inheritDoc
     */
    public function getClientsFdsByUserId(string $userId): array
    {
        $result = [];
        foreach ($this->table as $row) {
            if ($userId === $row[self::USER_ID_COLUMN]) {
                $result[] = $row[self::FD_COLUMN];
            }
        }

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function getAllFds(): Generator
    {
        foreach ($this->table as $row) {
            yield $row[self::FD_COLUMN];
        }
    }

    public function deleteClientByFd(int $fd): void
    {
        $this->table->delete($fd);
    }

    public function __destruct()
    {
        $this->table->destroy();
    }
}
<?php

namespace App\Services\Repositories;

use Generator;

interface ClientRepositoryInterface
{
    public function addClient(int $fd, string $userId): void;

    /**
     * @return int[]
     */
    public function getClientsFdsByUserId(string $userId): array;

    /**
     * @return Generator<int>
     */
    public function getAllFds(): Generator;

    public function deleteClientByFd(int $fd): void;
}
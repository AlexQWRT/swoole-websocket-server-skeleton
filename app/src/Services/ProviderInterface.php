<?php

namespace App\Services;

interface ProviderInterface
{
    /**
     * MUST return an array that contains a key-value pairs
     * of dependency ID and dependency according to PHP-DI
     * configuration rules.
     */
    public function __invoke(): array;
}

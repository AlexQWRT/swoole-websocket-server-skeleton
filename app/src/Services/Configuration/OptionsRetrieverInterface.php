<?php

namespace App\Services\Configuration;

interface OptionsRetrieverInterface
{
    /**
     * Returns an array of options from a place
     */
    public function getOptions(string $place): array;
}
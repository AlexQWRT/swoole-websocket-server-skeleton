<?php

namespace App\Services\Configuration\ArgumentsParsers;

use App\Services\Configuration\ArgumentsParserInterface;

class BasicArgumentsParser implements ArgumentsParserInterface
{

    public function parse(string $args): array
    {
        return explode('.', $args);
    }
}
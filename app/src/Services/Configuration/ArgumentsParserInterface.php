<?php

namespace App\Services\Configuration;

interface ArgumentsParserInterface
{

    public function parse(string $args): array;
}

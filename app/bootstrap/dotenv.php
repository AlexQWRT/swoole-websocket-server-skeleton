<?php

use Dotenv\Dotenv;

require_once __DIR__ . '/autoload.php';

Dotenv::createImmutable(
    dirname(__DIR__),
    '.env',
)->load();

if (!defined('ENV_FUNCTION_DEFINED')) {
    define('ENV_FUNCTION_DEFINED', true);

    /**
     * Returns a variable value from .env file by its name
     */
    function env(string $key, mixed $default = null): mixed
    {
        if (array_key_exists($key, $_ENV)) {
            return $_ENV[$key];
        }

        return $default;
    }
}

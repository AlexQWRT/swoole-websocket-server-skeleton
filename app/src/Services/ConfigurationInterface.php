<?php

namespace App\Services;

interface ConfigurationInterface
{
    /**
     * Return a configuration option by key
     * (e.g. $config->get('app.host', '127.0.0.1'),
     * where 'app' - config filename, 'host' - option name)
     */
    public function get(string $key, mixed $default = null): mixed;
}

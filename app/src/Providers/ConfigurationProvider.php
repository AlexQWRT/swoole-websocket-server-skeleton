<?php

namespace App\Providers;

use App\Services\Configuration\ArgumentsParsers\BasicArgumentsParser;
use App\Services\Configuration\BasicConfigurationService;
use App\Services\Configuration\OptionsRetrievers\FileOptionsRetriever;
use App\Services\ConfigurationInterface;
use App\Services\ProviderInterface;

class ConfigurationProvider implements ProviderInterface
{
    public function __invoke(): array
    {
        return [
            ConfigurationInterface::class => function () {
                return new BasicConfigurationService(
                    new BasicArgumentsParser(),
                    new FileOptionsRetriever(dirname(__DIR__, 2) . '/config')
                );
            },
        ];
    }
}
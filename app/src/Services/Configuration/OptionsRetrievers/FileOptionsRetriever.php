<?php

namespace App\Services\Configuration\OptionsRetrievers;

use App\Services\Configuration\OptionsRetrieverInterface;

class FileOptionsRetriever implements OptionsRetrieverInterface
{
    public function __construct(
        protected readonly string $configFilesDir
    )
    {
    }

    public function getOptions(string $place): array
    {
        $options = require sprintf(
            '%s/%s.php',
            $this->configFilesDir,
            $place
        );

        if (!is_array($options)) {
            return [];
        }

        return $options;
    }
}
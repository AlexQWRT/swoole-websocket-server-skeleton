<?php

namespace App\Services\Configuration;

use App\Services\ConfigurationInterface;

class BasicConfigurationService implements ConfigurationInterface
{
    public function __construct(
        protected readonly ArgumentsParserInterface $argumentsParser,
        protected readonly OptionsRetrieverInterface $optionsRetriever
    )
    {
    }

    /**
     * @inheritDoc
     */
    public function get(string $key, mixed $default = null): mixed
    {
        $arguments = $this->argumentsParser->parse($key);

        $options = $this->optionsRetriever->getOptions($arguments[0]);

        $argumentsCount = count($arguments);
        $needle = $options;
        for ($i = 1; $i < $argumentsCount; $i++) {
            if (array_key_exists($arguments[$i], $needle)) {
                $needle = $needle[$arguments[$i]];
            } else {
                return $default;
            }
        }

        return $needle;
    }
}
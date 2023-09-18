<?php

use App\Services\ProviderInterface;
use DI\Container;
use DI\ContainerBuilder;

require_once __DIR__ . '/autoload.php';

$containerConfig = [];
$files = new FilesystemIterator(dirname(__DIR__) . '/src/Providers');

foreach ($files as $file) {
    $className = str_replace('.php', '', $file->getFilename());
    $class = '\App\Providers\\' . $className;
    $provider = new $class();
    if (!($provider instanceof ProviderInterface)) {
        throw new InvalidArgumentException('Provider must be an instance of ' . ProviderInterface::class);
    }
    $containerConfig += $provider();
}

unset($files, $file);

return (new ContainerBuilder())
    ->addDefinitions($containerConfig)
    ->useAutowiring(true)
    ->build();

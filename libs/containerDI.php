<?php

namespace Libs;

use DI\ContainerBuilder;

class ContainerDI
{
    private $container;
    private array $entries;

    public function __construct()
    {
        $this->entries = require_once(__DIR__ . '/../config/entriesDI.php');

        $containerBuilder = new ContainerBuilder();
        $containerBuilder->addDefinitions($this->entries);
        $this->container = $containerBuilder->build();
    }

    public function getContainer()
    {
        return $this->container;
    }

    public function searchEntry(string $key): bool
    {
        return array_key_exists($key, $this->entries);
    }
}

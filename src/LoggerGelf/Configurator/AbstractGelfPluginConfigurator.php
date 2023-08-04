<?php

declare(strict_types = 1);

namespace Everon\LoggerGelf\Configurator;


use Everon\Shared\Logger\Configurator\MonologLevelConfiguratorTrait;

abstract class AbstractGelfPluginConfigurator
{
    use MonologLevelConfiguratorTrait;

    abstract public function ignoreTransportErrors(): ?bool;

    abstract public function shouldBubble(): ?bool;
}

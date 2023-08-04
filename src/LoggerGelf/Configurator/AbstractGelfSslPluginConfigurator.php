<?php

declare(strict_types = 1);

namespace Everon\LoggerGelf\Configurator;

use Everon\Shared\LoggerGelf\Configurator\Plugin\GelfLoggerPluginSslOptions;

abstract class AbstractGelfSslPluginConfigurator extends AbstractGelfPluginConfigurator
{
    abstract public function getSslOptions(): ?GelfLoggerPluginSslOptions;

    abstract public function requireSslOptions(): GelfLoggerPluginSslOptions;
}

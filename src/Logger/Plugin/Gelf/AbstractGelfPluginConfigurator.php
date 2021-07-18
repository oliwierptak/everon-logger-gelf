<?php

declare(strict_types = 1);

namespace Everon\Logger\Plugin\Gelf;

abstract class AbstractGelfPluginConfigurator
{
    abstract public function ignoreTransportErrors(): ?bool;
}

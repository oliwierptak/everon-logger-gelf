<?php

declare(strict_types = 1);

namespace Everon\LoggerGelf\Plugin\GelfUdp;

use Everon\LoggerGelf\Plugin\Gelf\AbstractGelfLoggerPlugin;
use Gelf\Transport\AbstractTransport;
use Gelf\Transport\UdpTransport;

/**
 * @property \Everon\Shared\LoggerGelf\Configurator\Plugin\GelfUdpLoggerPluginConfigurator $configurator
 */
class GelfUdpLoggerPlugin extends AbstractGelfLoggerPlugin
{
    public function canRun(): bool
    {
        return $this->configurator->hasHost();
    }

    protected function buildTransport(): AbstractTransport
    {
        return new UdpTransport(
            (string)$this->configurator->getHost(),
            (int)$this->configurator->getPort(),
            (int)$this->configurator->getChunkSize(),
        );
    }

    public function validate(): void
    {
        parent::validate();

        $this->configurator->requireHost();
        $this->configurator->requirePort();
        $this->configurator->requireChunkSize();
    }
}

<?php

declare(strict_types = 1);

namespace Everon\Logger\Plugin\GelfUdp;

use Everon\Logger\Plugin\Gelf\AbstractGelfLoggerPlugin;
use Gelf\Transport\AbstractTransport;
use Gelf\Transport\UdpTransport;

/**
 * @property \Everon\Logger\Configurator\Plugin\GelfUdpLoggerPluginConfigurator $configurator
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
            $this->configurator->getHost(),
            $this->configurator->getPort(),
            $this->configurator->getChunkSize()
        );
    }

    protected function validate(): void
    {
        parent::validate();

        $this->configurator->requireHost();
        $this->configurator->requirePort();
        $this->configurator->requireChunkSize();
    }
}

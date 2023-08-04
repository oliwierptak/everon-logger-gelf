<?php

declare(strict_types = 1);

namespace Everon\LoggerGelf\Plugin\GelfTcp;

use Everon\LoggerGelf\Plugin\Gelf\AbstractGelfLoggerPlugin;
use Gelf\Transport\AbstractTransport;
use Gelf\Transport\TcpTransport;

/**
 * @property \Everon\Shared\LoggerGelf\Configurator\Plugin\GelfTcpLoggerPluginConfigurator $configurator
 */
class GelfTcpLoggerPlugin extends AbstractGelfLoggerPlugin
{
    public function canRun(): bool
    {
        return $this->configurator->hasHost();
    }

    protected function buildTransport(): AbstractTransport
    {
        $sslOptions = $this->buildSslOptions($this->configurator->getSslOptions());

        return new TcpTransport(
            (string)$this->configurator->getHost(),
            (int)$this->configurator->getPort(),
            $sslOptions,
        );
    }

    public function validate(): void
    {
        parent::validate();

        $this->configurator->requireHost();
        $this->configurator->requirePort();
    }
}

<?php

declare(strict_types = 1);

namespace Everon\LoggerGelf\Plugin\GelfHttp;

use Everon\LoggerGelf\Plugin\Gelf\AbstractGelfLoggerPlugin;
use Gelf\Transport\AbstractTransport;
use Gelf\Transport\HttpTransport;

/**
 * @property \Everon\Shared\LoggerGelf\Configurator\Plugin\GelfHttpLoggerPluginConfigurator $configurator
 */
class GelfHttpLoggerPlugin extends AbstractGelfLoggerPlugin
{
    public function canRun(): bool
    {
        return $this->configurator->hasHost();
    }

    protected function buildTransport(): AbstractTransport
    {
        $sslOptions = $this->buildSslOptions($this->configurator->getSslOptions());

        return new HttpTransport(
            (string)$this->configurator->getHost(),
            (int)$this->configurator->getPort(),
            (string)$this->configurator->getPath(),
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

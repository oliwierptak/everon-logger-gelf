<?php

declare(strict_types = 1);

namespace Everon\LoggerGelf\Plugin\Gelf;

use Everon\Logger\Contract\Plugin\LoggerPluginInterface;
use Everon\LoggerGelf\Configurator\AbstractGelfPluginConfigurator;
use Everon\Shared\LoggerGelf\Configurator\Plugin\GelfLoggerPluginSslOptions;
use Gelf\Publisher;
use Gelf\PublisherInterface;
use Gelf\Transport\AbstractTransport;
use Gelf\Transport\IgnoreErrorTransportWrapper;
use Gelf\Transport\SslOptions;
use Monolog\Handler\GelfHandler;
use Monolog\Handler\HandlerInterface;

abstract class AbstractGelfLoggerPlugin implements LoggerPluginInterface
{
    abstract protected function buildTransport(): AbstractTransport;

    public function __construct(protected AbstractGelfPluginConfigurator $configurator) {}

    public function buildHandler(): HandlerInterface
    {
        $this->validate();
        $publisher = $this->buildPublisher();

        return new GelfHandler(
            $publisher,
            $this->configurator->requireLogLevel(),
            (bool)$this->configurator->shouldBubble(),
        );
    }

    public function validate(): void
    {
        $this->configurator->requireLogLevel();
    }

    protected function buildPublisher(): PublisherInterface
    {
        $transport = $this->buildTransport();
        if ($this->configurator->ignoreTransportErrors()) {
            $transport = new IgnoreErrorTransportWrapper($transport);
        }

        return new Publisher($transport);
    }

    protected function buildSslOptions(?GelfLoggerPluginSslOptions $configurator): ?SslOptions
    {
        if (!$configurator || !$configurator->useSsl()) {
            return null;
        }

        $sslOptions = new SslOptions();

        $sslOptions->setVerifyPeer(
            (bool)$configurator->verifyPeer(),
        );
        $sslOptions->setAllowSelfSigned(
            (bool)$configurator->allowSelfSigned(),
        );
        $sslOptions->setCaFile(
            $configurator->getCaFile(),
        );
        $sslOptions->setCiphers(
            $configurator->getCiphers(),
        );

        return $sslOptions;
    }
}

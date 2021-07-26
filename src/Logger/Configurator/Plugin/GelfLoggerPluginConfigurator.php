<?php

/**
 * Everon logger configuration file. Auto-generated.
 */

declare(strict_types=1);

namespace Everon\Logger\Configurator\Plugin;

use UnexpectedValueException;

class GelfLoggerPluginConfigurator
{
    protected const SHAPE_PROPERTIES = [
        'httpConfigurator' => \Everon\Logger\Configurator\Plugin\GelfHttpLoggerPluginConfigurator::class,
        'tcpConfigurator' => \Everon\Logger\Configurator\Plugin\GelfTcpLoggerPluginConfigurator::class,
        'udpConfigurator' => \Everon\Logger\Configurator\Plugin\GelfUdpLoggerPluginConfigurator::class,
    ];

    protected const METADATA = [
        'httpConfigurator' => [
            'type' => 'popo',
            'default' => \Everon\Logger\Configurator\Plugin\GelfHttpLoggerPluginConfigurator::class,
        ],
        'tcpConfigurator' => [
            'type' => 'popo',
            'default' => \Everon\Logger\Configurator\Plugin\GelfTcpLoggerPluginConfigurator::class,
        ],
        'udpConfigurator' => [
            'type' => 'popo',
            'default' => \Everon\Logger\Configurator\Plugin\GelfUdpLoggerPluginConfigurator::class,
        ],
    ];

    /** HTTP related options. */
    protected ?GelfHttpLoggerPluginConfigurator $httpConfigurator = null;

    /** TCP related options. */
    protected ?GelfTcpLoggerPluginConfigurator $tcpConfigurator = null;

    /** UDP related options. */
    protected ?GelfUdpLoggerPluginConfigurator $udpConfigurator = null;
    protected array $updateMap = [];

    /**
     * HTTP related options.
     */
    public function setHttpConfigurator(?GelfHttpLoggerPluginConfigurator $httpConfigurator): self
    {
        $this->httpConfigurator = $httpConfigurator; $this->updateMap['httpConfigurator'] = true; return $this;
    }

    /**
     * HTTP related options.
     */
    public function getHttpConfigurator(): ?GelfHttpLoggerPluginConfigurator
    {
        return $this->httpConfigurator;
    }

    /**
     * HTTP related options.
     */
    public function requireHttpConfigurator(): GelfHttpLoggerPluginConfigurator
    {
        if (static::METADATA['httpConfigurator']['type'] === 'popo' && $this->httpConfigurator === null) {
            $popo = static::METADATA['httpConfigurator']['default'];
            $this->httpConfigurator = new $popo;
        }

        if ($this->httpConfigurator === null) {
            throw new UnexpectedValueException('Required value of "httpConfigurator" has not been set');
        }
        return $this->httpConfigurator;
    }

    public function hasHttpConfigurator(): bool
    {
        return $this->httpConfigurator !== null || ($this->httpConfigurator !== null && array_key_exists('httpConfigurator', $this->updateMap));
    }

    /**
     * TCP related options.
     */
    public function setTcpConfigurator(?GelfTcpLoggerPluginConfigurator $tcpConfigurator): self
    {
        $this->tcpConfigurator = $tcpConfigurator; $this->updateMap['tcpConfigurator'] = true; return $this;
    }

    /**
     * TCP related options.
     */
    public function getTcpConfigurator(): ?GelfTcpLoggerPluginConfigurator
    {
        return $this->tcpConfigurator;
    }

    /**
     * TCP related options.
     */
    public function requireTcpConfigurator(): GelfTcpLoggerPluginConfigurator
    {
        if (static::METADATA['tcpConfigurator']['type'] === 'popo' && $this->tcpConfigurator === null) {
            $popo = static::METADATA['tcpConfigurator']['default'];
            $this->tcpConfigurator = new $popo;
        }

        if ($this->tcpConfigurator === null) {
            throw new UnexpectedValueException('Required value of "tcpConfigurator" has not been set');
        }
        return $this->tcpConfigurator;
    }

    public function hasTcpConfigurator(): bool
    {
        return $this->tcpConfigurator !== null || ($this->tcpConfigurator !== null && array_key_exists('tcpConfigurator', $this->updateMap));
    }

    /**
     * UDP related options.
     */
    public function setUdpConfigurator(?GelfUdpLoggerPluginConfigurator $udpConfigurator): self
    {
        $this->udpConfigurator = $udpConfigurator; $this->updateMap['udpConfigurator'] = true; return $this;
    }

    /**
     * UDP related options.
     */
    public function getUdpConfigurator(): ?GelfUdpLoggerPluginConfigurator
    {
        return $this->udpConfigurator;
    }

    /**
     * UDP related options.
     */
    public function requireUdpConfigurator(): GelfUdpLoggerPluginConfigurator
    {
        if (static::METADATA['udpConfigurator']['type'] === 'popo' && $this->udpConfigurator === null) {
            $popo = static::METADATA['udpConfigurator']['default'];
            $this->udpConfigurator = new $popo;
        }

        if ($this->udpConfigurator === null) {
            throw new UnexpectedValueException('Required value of "udpConfigurator" has not been set');
        }
        return $this->udpConfigurator;
    }

    public function hasUdpConfigurator(): bool
    {
        return $this->udpConfigurator !== null || ($this->udpConfigurator !== null && array_key_exists('udpConfigurator', $this->updateMap));
    }

    #[\JetBrains\PhpStorm\ArrayShape(self::SHAPE_PROPERTIES)]
    public function toArray(): array
    {
        $data = [
            'httpConfigurator' => $this->httpConfigurator,
            'tcpConfigurator' => $this->tcpConfigurator,
            'udpConfigurator' => $this->udpConfigurator,
        ];

        array_walk(
            $data,
            function (&$value, $name) use ($data) {
                $popo = static::METADATA[$name]['default'];
                if (static::METADATA[$name]['type'] === 'popo') {
                    $value = $this->$name !== null ? $this->$name->toArray() : (new $popo)->toArray();
                }
            }
        );

        return $data;
    }

    public function fromArray(#[\JetBrains\PhpStorm\ArrayShape(self::SHAPE_PROPERTIES)] array $data): self
    {
        foreach (static::METADATA as $name => $meta) {
            $value = $data[$name] ?? $this->$name ?? null;
            $popoValue = $meta['default'];

            if ($popoValue !== null && $meta['type'] === 'popo') {
                $popo = new $popoValue;

                if (is_array($value)) {
                    $popo->fromArray($value);
                }

                $value = $popo;
            }

            $this->$name = $value;
            $this->updateMap[$name] = true;
        }

        return $this;
    }

    public function isNew(): bool
    {
        return empty($this->updateMap) === true;
    }

    public function requireAll(): self
    {
        $errors = [];

        try {
            $this->requireHttpConfigurator();
        }
        catch (\Throwable $throwable) {
            $errors['httpConfigurator'] = $throwable->getMessage();
        }
        try {
            $this->requireTcpConfigurator();
        }
        catch (\Throwable $throwable) {
            $errors['tcpConfigurator'] = $throwable->getMessage();
        }
        try {
            $this->requireUdpConfigurator();
        }
        catch (\Throwable $throwable) {
            $errors['udpConfigurator'] = $throwable->getMessage();
        }

        if (empty($errors) === false) {
            throw new UnexpectedValueException(
                implode("\n", $errors)
            );
        }

        return $this;
    }
}

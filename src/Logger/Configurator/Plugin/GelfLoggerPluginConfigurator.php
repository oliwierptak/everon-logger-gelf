<?php

/**
 * Everon logger configuration file. Auto-generated.
 */

declare(strict_types=1);

namespace Everon\Logger\Configurator\Plugin;

use UnexpectedValueException;

class GelfLoggerPluginConfigurator implements \Everon\Logger\Contract\Configurator\PluginConfiguratorInterface
{
    protected const SHAPE_PROPERTIES = [
        'httpConfigurator' => \Everon\Logger\Configurator\Plugin\GelfHttpLoggerPluginConfigurator::class,
        'logLevel' => 'null|string',
        'pluginClass' => 'null|string',
        'pluginFactoryClass' => 'null|string',
        'shouldBubble' => 'null|bool',
        'tcpConfigurator' => \Everon\Logger\Configurator\Plugin\GelfTcpLoggerPluginConfigurator::class,
        'udpConfigurator' => \Everon\Logger\Configurator\Plugin\GelfUdpLoggerPluginConfigurator::class,
    ];

    protected const METADATA = [
        'httpConfigurator' => [
            'type' => 'popo',
            'default' => \Everon\Logger\Configurator\Plugin\GelfHttpLoggerPluginConfigurator::class,
        ],
        'logLevel' => ['type' => 'string', 'default' => 'debug'],
        'pluginClass' => ['type' => 'string', 'default' => null],
        'pluginFactoryClass' => ['type' => 'string', 'default' => null],
        'shouldBubble' => ['type' => 'bool', 'default' => true],
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

    /** The minimum logging level at which this handler will be triggered */
    protected ?string $logLevel = 'debug';
    protected ?string $pluginClass = null;

    /** Defines custom plugin factory to be used to create a plugin */
    protected ?string $pluginFactoryClass = null;

    /** Whether the messages that are handled can bubble up the stack or not */
    protected ?bool $shouldBubble = true;

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
     * The minimum logging level at which this handler will be triggered
     */
    public function setLogLevel(?string $logLevel): self
    {
        $this->logLevel = $logLevel; $this->updateMap['logLevel'] = true; return $this;
    }

    /**
     * The minimum logging level at which this handler will be triggered
     */
    public function getLogLevel(): ?string
    {
        return $this->logLevel;
    }

    /**
     * The minimum logging level at which this handler will be triggered
     */
    public function requireLogLevel(): string
    {
        if (static::METADATA['logLevel']['type'] === 'popo' && $this->logLevel === null) {
            $popo = static::METADATA['logLevel']['default'];
            $this->logLevel = new $popo;
        }

        if ($this->logLevel === null) {
            throw new UnexpectedValueException('Required value of "logLevel" has not been set');
        }
        return $this->logLevel;
    }

    public function hasLogLevel(): bool
    {
        return $this->logLevel !== null || ($this->logLevel !== null && array_key_exists('logLevel', $this->updateMap));
    }

    public function setPluginClass(?string $pluginClass): self
    {
        $this->pluginClass = $pluginClass; $this->updateMap['pluginClass'] = true; return $this;
    }

    public function getPluginClass(): ?string
    {
        return $this->pluginClass;
    }

    public function requirePluginClass(): string
    {
        if (static::METADATA['pluginClass']['type'] === 'popo' && $this->pluginClass === null) {
            $popo = static::METADATA['pluginClass']['default'];
            $this->pluginClass = new $popo;
        }

        if ($this->pluginClass === null) {
            throw new UnexpectedValueException('Required value of "pluginClass" has not been set');
        }
        return $this->pluginClass;
    }

    public function hasPluginClass(): bool
    {
        return $this->pluginClass !== null || ($this->pluginClass !== null && array_key_exists('pluginClass', $this->updateMap));
    }

    /**
     * Defines custom plugin factory to be used to create a plugin
     */
    public function setPluginFactoryClass(?string $pluginFactoryClass): self
    {
        $this->pluginFactoryClass = $pluginFactoryClass; $this->updateMap['pluginFactoryClass'] = true; return $this;
    }

    /**
     * Defines custom plugin factory to be used to create a plugin
     */
    public function getPluginFactoryClass(): ?string
    {
        return $this->pluginFactoryClass;
    }

    /**
     * Defines custom plugin factory to be used to create a plugin
     */
    public function requirePluginFactoryClass(): string
    {
        if (static::METADATA['pluginFactoryClass']['type'] === 'popo' && $this->pluginFactoryClass === null) {
            $popo = static::METADATA['pluginFactoryClass']['default'];
            $this->pluginFactoryClass = new $popo;
        }

        if ($this->pluginFactoryClass === null) {
            throw new UnexpectedValueException('Required value of "pluginFactoryClass" has not been set');
        }
        return $this->pluginFactoryClass;
    }

    public function hasPluginFactoryClass(): bool
    {
        return $this->pluginFactoryClass !== null || ($this->pluginFactoryClass !== null && array_key_exists('pluginFactoryClass', $this->updateMap));
    }

    /**
     * Whether the messages that are handled can bubble up the stack or not
     */
    public function setShouldBubble(?bool $shouldBubble): self
    {
        $this->shouldBubble = $shouldBubble; $this->updateMap['shouldBubble'] = true; return $this;
    }

    /**
     * Whether the messages that are handled can bubble up the stack or not
     */
    public function shouldBubble(): ?bool
    {
        return $this->shouldBubble;
    }

    /**
     * Whether the messages that are handled can bubble up the stack or not
     */
    public function requireShouldBubble(): bool
    {
        if (static::METADATA['shouldBubble']['type'] === 'popo' && $this->shouldBubble === null) {
            $popo = static::METADATA['shouldBubble']['default'];
            $this->shouldBubble = new $popo;
        }

        if ($this->shouldBubble === null) {
            throw new UnexpectedValueException('Required value of "shouldBubble" has not been set');
        }
        return $this->shouldBubble;
    }

    public function hasShouldBubble(): bool
    {
        return $this->shouldBubble !== null || ($this->shouldBubble !== null && array_key_exists('shouldBubble', $this->updateMap));
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
            'logLevel' => $this->logLevel,
            'pluginClass' => $this->pluginClass,
            'pluginFactoryClass' => $this->pluginFactoryClass,
            'shouldBubble' => $this->shouldBubble,
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
            $this->requireLogLevel();
        }
        catch (\Throwable $throwable) {
            $errors['logLevel'] = $throwable->getMessage();
        }
        try {
            $this->requirePluginClass();
        }
        catch (\Throwable $throwable) {
            $errors['pluginClass'] = $throwable->getMessage();
        }
        try {
            $this->requirePluginFactoryClass();
        }
        catch (\Throwable $throwable) {
            $errors['pluginFactoryClass'] = $throwable->getMessage();
        }
        try {
            $this->requireShouldBubble();
        }
        catch (\Throwable $throwable) {
            $errors['shouldBubble'] = $throwable->getMessage();
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

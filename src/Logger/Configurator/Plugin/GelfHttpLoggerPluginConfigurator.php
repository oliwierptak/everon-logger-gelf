<?php

/**
 * Everon logger configuration file. Auto-generated.
 */

declare(strict_types=1);

namespace Everon\Logger\Configurator\Plugin;

use UnexpectedValueException;

class GelfHttpLoggerPluginConfigurator extends \Everon\Logger\Plugin\Gelf\AbstractGelfSslPluginConfigurator implements \Everon\Logger\Contract\Configurator\PluginConfiguratorInterface
{
    protected const SHAPE_PROPERTIES = [
        'host' => 'null|string',
        'ignoreTransportErrors' => 'null|bool',
        'logLevel' => 'null|string',
        'path' => 'null|string',
        'pluginClass' => 'null|string',
        'pluginFactoryClass' => 'null|string',
        'port' => 'null|int',
        'shouldBubble' => 'null|bool',
        'sslOptions' => \Everon\Logger\Configurator\Plugin\GelfLoggerPluginSslOptions::class,
    ];

    protected const METADATA = [
        'host' => ['type' => 'string', 'default' => \Gelf\Transport\HttpTransport::DEFAULT_HOST],
        'ignoreTransportErrors' => ['type' => 'bool', 'default' => true],
        'logLevel' => ['type' => 'string', 'default' => 'debug'],
        'path' => ['type' => 'string', 'default' => \Gelf\Transport\HttpTransport::DEFAULT_PATH],
        'pluginClass' => ['type' => 'string', 'default' => \Everon\Logger\Plugin\GelfHttp\GelfHttpLoggerPlugin::class],
        'pluginFactoryClass' => ['type' => 'string', 'default' => null],
        'port' => ['type' => 'int', 'default' => \Gelf\Transport\HttpTransport::DEFAULT_PORT],
        'shouldBubble' => ['type' => 'bool', 'default' => true],
        'sslOptions' => [
            'type' => 'popo',
            'default' => \Everon\Logger\Configurator\Plugin\GelfLoggerPluginSslOptions::class,
        ],
    ];

    /** when NULL or empty default-host is used */
    protected ?string $host = \Gelf\Transport\HttpTransport::DEFAULT_HOST;

    /** A wrapper for any AbstractTransport to ignore any kind of errors */
    protected ?bool $ignoreTransportErrors = true;

    /** The minimum logging level at which this handler will be triggered */
    protected ?string $logLevel = 'debug';

    /** when NULL or empty default-path is used */
    protected ?string $path = \Gelf\Transport\HttpTransport::DEFAULT_PATH;
    protected ?string $pluginClass = \Everon\Logger\Plugin\GelfHttp\GelfHttpLoggerPlugin::class;

    /** Defines custom plugin factory to be used to create a plugin */
    protected ?string $pluginFactoryClass = null;

    /** when NULL or empty default-port is used */
    protected ?int $port = \Gelf\Transport\HttpTransport::DEFAULT_PORT;

    /** Whether the messages that are handled can bubble up the stack or not */
    protected ?bool $shouldBubble = true;

    /** when useSsl is false, the SSL is not used */
    protected ?GelfLoggerPluginSslOptions $sslOptions = null;
    protected array $updateMap = [];

    /**
     * when NULL or empty default-host is used
     */
    public function setHost(?string $host): self
    {
        $this->host = $host; $this->updateMap['host'] = true; return $this;
    }

    /**
     * when NULL or empty default-host is used
     */
    public function getHost(): ?string
    {
        return $this->host;
    }

    /**
     * when NULL or empty default-host is used
     */
    public function requireHost(): string
    {
        $this->setupPopoProperty('host');

        if ($this->host === null) {
            throw new UnexpectedValueException('Required value of "host" has not been set');
        }
        return $this->host;
    }

    public function hasHost(): bool
    {
        return $this->host !== null;
    }

    /**
     * A wrapper for any AbstractTransport to ignore any kind of errors
     */
    public function setIgnoreTransportErrors(?bool $ignoreTransportErrors): self
    {
        $this->ignoreTransportErrors = $ignoreTransportErrors; $this->updateMap['ignoreTransportErrors'] = true; return $this;
    }

    /**
     * A wrapper for any AbstractTransport to ignore any kind of errors
     */
    public function ignoreTransportErrors(): ?bool
    {
        return $this->ignoreTransportErrors;
    }

    /**
     * A wrapper for any AbstractTransport to ignore any kind of errors
     */
    public function requireIgnoreTransportErrors(): bool
    {
        $this->setupPopoProperty('ignoreTransportErrors');

        if ($this->ignoreTransportErrors === null) {
            throw new UnexpectedValueException('Required value of "ignoreTransportErrors" has not been set');
        }
        return $this->ignoreTransportErrors;
    }

    public function hasIgnoreTransportErrors(): bool
    {
        return $this->ignoreTransportErrors !== null;
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
        $this->setupPopoProperty('logLevel');

        if ($this->logLevel === null) {
            throw new UnexpectedValueException('Required value of "logLevel" has not been set');
        }
        return $this->logLevel;
    }

    public function hasLogLevel(): bool
    {
        return $this->logLevel !== null;
    }

    /**
     * when NULL or empty default-path is used
     */
    public function setPath(?string $path): self
    {
        $this->path = $path; $this->updateMap['path'] = true; return $this;
    }

    /**
     * when NULL or empty default-path is used
     */
    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * when NULL or empty default-path is used
     */
    public function requirePath(): string
    {
        $this->setupPopoProperty('path');

        if ($this->path === null) {
            throw new UnexpectedValueException('Required value of "path" has not been set');
        }
        return $this->path;
    }

    public function hasPath(): bool
    {
        return $this->path !== null;
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
        $this->setupPopoProperty('pluginClass');

        if ($this->pluginClass === null) {
            throw new UnexpectedValueException('Required value of "pluginClass" has not been set');
        }
        return $this->pluginClass;
    }

    public function hasPluginClass(): bool
    {
        return $this->pluginClass !== null;
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
        $this->setupPopoProperty('pluginFactoryClass');

        if ($this->pluginFactoryClass === null) {
            throw new UnexpectedValueException('Required value of "pluginFactoryClass" has not been set');
        }
        return $this->pluginFactoryClass;
    }

    public function hasPluginFactoryClass(): bool
    {
        return $this->pluginFactoryClass !== null;
    }

    /**
     * when NULL or empty default-port is used
     */
    public function setPort(?int $port): self
    {
        $this->port = $port; $this->updateMap['port'] = true; return $this;
    }

    /**
     * when NULL or empty default-port is used
     */
    public function getPort(): ?int
    {
        return $this->port;
    }

    /**
     * when NULL or empty default-port is used
     */
    public function requirePort(): int
    {
        $this->setupPopoProperty('port');

        if ($this->port === null) {
            throw new UnexpectedValueException('Required value of "port" has not been set');
        }
        return $this->port;
    }

    public function hasPort(): bool
    {
        return $this->port !== null;
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
        $this->setupPopoProperty('shouldBubble');

        if ($this->shouldBubble === null) {
            throw new UnexpectedValueException('Required value of "shouldBubble" has not been set');
        }
        return $this->shouldBubble;
    }

    public function hasShouldBubble(): bool
    {
        return $this->shouldBubble !== null;
    }

    /**
     * when useSsl is false, the SSL is not used
     */
    public function setSslOptions(?GelfLoggerPluginSslOptions $sslOptions): self
    {
        $this->sslOptions = $sslOptions; $this->updateMap['sslOptions'] = true; return $this;
    }

    /**
     * when useSsl is false, the SSL is not used
     */
    public function getSslOptions(): ?GelfLoggerPluginSslOptions
    {
        return $this->sslOptions;
    }

    /**
     * when useSsl is false, the SSL is not used
     */
    public function requireSslOptions(): GelfLoggerPluginSslOptions
    {
        $this->setupPopoProperty('sslOptions');

        if ($this->sslOptions === null) {
            throw new UnexpectedValueException('Required value of "sslOptions" has not been set');
        }
        return $this->sslOptions;
    }

    public function hasSslOptions(): bool
    {
        return $this->sslOptions !== null;
    }

    #[\JetBrains\PhpStorm\ArrayShape(self::SHAPE_PROPERTIES)]
    public function toArray(): array
    {
        $data = [
            'host' => $this->host,
            'ignoreTransportErrors' => $this->ignoreTransportErrors,
            'logLevel' => $this->logLevel,
            'path' => $this->path,
            'pluginClass' => $this->pluginClass,
            'pluginFactoryClass' => $this->pluginFactoryClass,
            'port' => $this->port,
            'shouldBubble' => $this->shouldBubble,
            'sslOptions' => $this->sslOptions,
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

    public function listModifiedProperties(): array
    {
        return array_keys($this->updateMap);
    }

    public function requireAll(): self
    {
        $errors = [];

        try {
            $this->requireHost();
        }
        catch (\Throwable $throwable) {
            $errors['host'] = $throwable->getMessage();
        }
        try {
            $this->requireIgnoreTransportErrors();
        }
        catch (\Throwable $throwable) {
            $errors['ignoreTransportErrors'] = $throwable->getMessage();
        }
        try {
            $this->requireLogLevel();
        }
        catch (\Throwable $throwable) {
            $errors['logLevel'] = $throwable->getMessage();
        }
        try {
            $this->requirePath();
        }
        catch (\Throwable $throwable) {
            $errors['path'] = $throwable->getMessage();
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
            $this->requirePort();
        }
        catch (\Throwable $throwable) {
            $errors['port'] = $throwable->getMessage();
        }
        try {
            $this->requireShouldBubble();
        }
        catch (\Throwable $throwable) {
            $errors['shouldBubble'] = $throwable->getMessage();
        }
        try {
            $this->requireSslOptions();
        }
        catch (\Throwable $throwable) {
            $errors['sslOptions'] = $throwable->getMessage();
        }

        if (empty($errors) === false) {
            throw new UnexpectedValueException(
                implode("\n", $errors)
            );
        }

        return $this;
    }

    protected function setupPopoProperty($propertyName): void
    {
        if (static::METADATA[$propertyName]['type'] === 'popo' && $this->$propertyName === null) {
            $popo = static::METADATA[$propertyName]['default'];
            $this->$propertyName = new $popo;
        }
    }
}

<?php

/**
 * Everon logger configuration file. Auto-generated.
 */

declare(strict_types=1);

namespace Everon\Logger\Configurator\Plugin;

use UnexpectedValueException;

class GelfLoggerPluginSslOptions implements \Everon\Logger\Contract\Configurator\PluginConfiguratorInterface
{
    protected const SHAPE_PROPERTIES = [
        'allowSelfSigned' => 'null|bool',
        'caFile' => 'null|string',
        'ciphers' => 'null|string',
        'logLevel' => 'null|string',
        'pluginClass' => 'null|string',
        'pluginFactoryClass' => 'null|string',
        'shouldBubble' => 'null|bool',
        'useSsl' => 'null|bool',
        'verifyPeer' => 'null|bool',
    ];

    protected const METADATA = [
        'allowSelfSigned' => ['type' => 'bool', 'default' => false],
        'caFile' => ['type' => 'string', 'default' => null],
        'ciphers' => ['type' => 'string', 'default' => null],
        'logLevel' => ['type' => 'string', 'default' => 'debug'],
        'pluginClass' => ['type' => 'string', 'default' => null],
        'pluginFactoryClass' => ['type' => 'string', 'default' => null],
        'shouldBubble' => ['type' => 'bool', 'default' => true],
        'useSsl' => ['type' => 'bool', 'default' => false],
        'verifyPeer' => ['type' => 'bool', 'default' => true],
    ];

    /** Allow self-signed certificates */
    protected ?bool $allowSelfSigned = false;

    /** Path to custom CA */
    protected ?string $caFile = null;

    /** List of ciphers the SSL layer may use. Formatted as specified in ciphers(1) */
    protected ?string $ciphers = null;

    /** The minimum logging level at which this handler will be triggered */
    protected ?string $logLevel = 'debug';
    protected ?string $pluginClass = null;

    /** Defines custom plugin factory to be used to create a plugin */
    protected ?string $pluginFactoryClass = null;

    /** Whether the messages that are handled can bubble up the stack or not */
    protected ?bool $shouldBubble = true;

    /** Whenever to use Gelf\Transport\SslOptions */
    protected ?bool $useSsl = false;

    /** Enable certificate validation of remote party */
    protected ?bool $verifyPeer = true;
    protected array $updateMap = [];

    /**
     * Allow self-signed certificates
     */
    public function setAllowSelfSigned(?bool $allowSelfSigned): self
    {
        $this->allowSelfSigned = $allowSelfSigned; $this->updateMap['allowSelfSigned'] = true; return $this;
    }

    /**
     * Allow self-signed certificates
     */
    public function allowSelfSigned(): ?bool
    {
        return $this->allowSelfSigned;
    }

    /**
     * Allow self-signed certificates
     */
    public function requireAllowSelfSigned(): bool
    {
        if (static::METADATA['allowSelfSigned']['type'] === 'popo' && $this->allowSelfSigned === null) {
            $popo = static::METADATA['allowSelfSigned']['default'];
            $this->allowSelfSigned = new $popo;
        }

        if ($this->allowSelfSigned === null) {
            throw new UnexpectedValueException('Required value of "allowSelfSigned" has not been set');
        }
        return $this->allowSelfSigned;
    }

    public function hasAllowSelfSigned(): bool
    {
        return $this->allowSelfSigned !== null || ($this->allowSelfSigned !== null && array_key_exists('allowSelfSigned', $this->updateMap));
    }

    /**
     * Path to custom CA
     */
    public function setCaFile(?string $caFile): self
    {
        $this->caFile = $caFile; $this->updateMap['caFile'] = true; return $this;
    }

    /**
     * Path to custom CA
     */
    public function getCaFile(): ?string
    {
        return $this->caFile;
    }

    /**
     * Path to custom CA
     */
    public function requireCaFile(): string
    {
        if (static::METADATA['caFile']['type'] === 'popo' && $this->caFile === null) {
            $popo = static::METADATA['caFile']['default'];
            $this->caFile = new $popo;
        }

        if ($this->caFile === null) {
            throw new UnexpectedValueException('Required value of "caFile" has not been set');
        }
        return $this->caFile;
    }

    public function hasCaFile(): bool
    {
        return $this->caFile !== null || ($this->caFile !== null && array_key_exists('caFile', $this->updateMap));
    }

    /**
     * List of ciphers the SSL layer may use. Formatted as specified in ciphers(1)
     */
    public function setCiphers(?string $ciphers): self
    {
        $this->ciphers = $ciphers; $this->updateMap['ciphers'] = true; return $this;
    }

    /**
     * List of ciphers the SSL layer may use. Formatted as specified in ciphers(1)
     */
    public function getCiphers(): ?string
    {
        return $this->ciphers;
    }

    /**
     * List of ciphers the SSL layer may use. Formatted as specified in ciphers(1)
     */
    public function requireCiphers(): string
    {
        if (static::METADATA['ciphers']['type'] === 'popo' && $this->ciphers === null) {
            $popo = static::METADATA['ciphers']['default'];
            $this->ciphers = new $popo;
        }

        if ($this->ciphers === null) {
            throw new UnexpectedValueException('Required value of "ciphers" has not been set');
        }
        return $this->ciphers;
    }

    public function hasCiphers(): bool
    {
        return $this->ciphers !== null || ($this->ciphers !== null && array_key_exists('ciphers', $this->updateMap));
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
     * Whenever to use Gelf\Transport\SslOptions
     */
    public function setUseSsl(?bool $useSsl): self
    {
        $this->useSsl = $useSsl; $this->updateMap['useSsl'] = true; return $this;
    }

    /**
     * Whenever to use Gelf\Transport\SslOptions
     */
    public function useSsl(): ?bool
    {
        return $this->useSsl;
    }

    /**
     * Whenever to use Gelf\Transport\SslOptions
     */
    public function requireUseSsl(): bool
    {
        if (static::METADATA['useSsl']['type'] === 'popo' && $this->useSsl === null) {
            $popo = static::METADATA['useSsl']['default'];
            $this->useSsl = new $popo;
        }

        if ($this->useSsl === null) {
            throw new UnexpectedValueException('Required value of "useSsl" has not been set');
        }
        return $this->useSsl;
    }

    public function hasUseSsl(): bool
    {
        return $this->useSsl !== null || ($this->useSsl !== null && array_key_exists('useSsl', $this->updateMap));
    }

    /**
     * Enable certificate validation of remote party
     */
    public function setVerifyPeer(?bool $verifyPeer): self
    {
        $this->verifyPeer = $verifyPeer; $this->updateMap['verifyPeer'] = true; return $this;
    }

    /**
     * Enable certificate validation of remote party
     */
    public function verifyPeer(): ?bool
    {
        return $this->verifyPeer;
    }

    /**
     * Enable certificate validation of remote party
     */
    public function requireVerifyPeer(): bool
    {
        if (static::METADATA['verifyPeer']['type'] === 'popo' && $this->verifyPeer === null) {
            $popo = static::METADATA['verifyPeer']['default'];
            $this->verifyPeer = new $popo;
        }

        if ($this->verifyPeer === null) {
            throw new UnexpectedValueException('Required value of "verifyPeer" has not been set');
        }
        return $this->verifyPeer;
    }

    public function hasVerifyPeer(): bool
    {
        return $this->verifyPeer !== null || ($this->verifyPeer !== null && array_key_exists('verifyPeer', $this->updateMap));
    }

    #[\JetBrains\PhpStorm\ArrayShape(self::SHAPE_PROPERTIES)]
    public function toArray(): array
    {
        $data = [
            'allowSelfSigned' => $this->allowSelfSigned,
            'caFile' => $this->caFile,
            'ciphers' => $this->ciphers,
            'logLevel' => $this->logLevel,
            'pluginClass' => $this->pluginClass,
            'pluginFactoryClass' => $this->pluginFactoryClass,
            'shouldBubble' => $this->shouldBubble,
            'useSsl' => $this->useSsl,
            'verifyPeer' => $this->verifyPeer,
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
            $this->requireAllowSelfSigned();
        }
        catch (\Throwable $throwable) {
            $errors['allowSelfSigned'] = $throwable->getMessage();
        }
        try {
            $this->requireCaFile();
        }
        catch (\Throwable $throwable) {
            $errors['caFile'] = $throwable->getMessage();
        }
        try {
            $this->requireCiphers();
        }
        catch (\Throwable $throwable) {
            $errors['ciphers'] = $throwable->getMessage();
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
            $this->requireUseSsl();
        }
        catch (\Throwable $throwable) {
            $errors['useSsl'] = $throwable->getMessage();
        }
        try {
            $this->requireVerifyPeer();
        }
        catch (\Throwable $throwable) {
            $errors['verifyPeer'] = $throwable->getMessage();
        }

        if (empty($errors) === false) {
            throw new UnexpectedValueException(
                implode("\n", $errors)
            );
        }

        return $this;
    }
}

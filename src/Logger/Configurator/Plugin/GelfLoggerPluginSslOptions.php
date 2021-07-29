<?php

/**
 * Everon logger configuration file. Auto-generated.
 */

declare(strict_types=1);

namespace Everon\Logger\Configurator\Plugin;

use UnexpectedValueException;

class GelfLoggerPluginSslOptions
{
    protected const SHAPE_PROPERTIES = [
        'allowSelfSigned' => 'null|bool',
        'caFile' => 'null|string',
        'ciphers' => 'null|string',
        'useSsl' => 'null|bool',
        'verifyPeer' => 'null|bool',
    ];

    protected const METADATA = [
        'allowSelfSigned' => ['type' => 'bool', 'default' => false],
        'caFile' => ['type' => 'string', 'default' => null],
        'ciphers' => ['type' => 'string', 'default' => null],
        'useSsl' => ['type' => 'bool', 'default' => false],
        'verifyPeer' => ['type' => 'bool', 'default' => true],
    ];

    /** Allow self-signed certificates */
    protected ?bool $allowSelfSigned = false;

    /** Path to custom CA */
    protected ?string $caFile = null;

    /** List of ciphers the SSL layer may use. Formatted as specified in ciphers(1) */
    protected ?string $ciphers = null;

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
        $this->setupPopoProperty('allowSelfSigned');

        if ($this->allowSelfSigned === null) {
            throw new UnexpectedValueException('Required value of "allowSelfSigned" has not been set');
        }
        return $this->allowSelfSigned;
    }

    public function hasAllowSelfSigned(): bool
    {
        return $this->allowSelfSigned !== null;
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
        $this->setupPopoProperty('caFile');

        if ($this->caFile === null) {
            throw new UnexpectedValueException('Required value of "caFile" has not been set');
        }
        return $this->caFile;
    }

    public function hasCaFile(): bool
    {
        return $this->caFile !== null;
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
        $this->setupPopoProperty('ciphers');

        if ($this->ciphers === null) {
            throw new UnexpectedValueException('Required value of "ciphers" has not been set');
        }
        return $this->ciphers;
    }

    public function hasCiphers(): bool
    {
        return $this->ciphers !== null;
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
        $this->setupPopoProperty('useSsl');

        if ($this->useSsl === null) {
            throw new UnexpectedValueException('Required value of "useSsl" has not been set');
        }
        return $this->useSsl;
    }

    public function hasUseSsl(): bool
    {
        return $this->useSsl !== null;
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
        $this->setupPopoProperty('verifyPeer');

        if ($this->verifyPeer === null) {
            throw new UnexpectedValueException('Required value of "verifyPeer" has not been set');
        }
        return $this->verifyPeer;
    }

    public function hasVerifyPeer(): bool
    {
        return $this->verifyPeer !== null;
    }

    #[\JetBrains\PhpStorm\ArrayShape(self::SHAPE_PROPERTIES)]
    public function toArray(): array
    {
        $data = [
            'allowSelfSigned' => $this->allowSelfSigned,
            'caFile' => $this->caFile,
            'ciphers' => $this->ciphers,
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

    public function listModifiedProperties(): array
    {
        return array_keys($this->updateMap);
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

    protected function setupPopoProperty($propertyName): void
    {
        if (static::METADATA[$propertyName]['type'] === 'popo' && $this->$propertyName === null) {
            $popo = static::METADATA[$propertyName]['default'];
            $this->$propertyName = new $popo;
        }
    }
}

<?php

/**
 * @SuppressWarnings(PHPMD)
 * @phpcs:ignoreFile
 * Everon logger configuration file. Auto-generated.
 */

declare(strict_types=1);

namespace Everon\Shared\LoggerGelf\Configurator\Plugin;

use DateTime;
use DateTimeZone;
use Throwable;
use UnexpectedValueException;

use function array_filter;
use function array_key_exists;
use function array_keys;
use function array_replace_recursive;
use function in_array;
use function sort;

use const ARRAY_FILTER_USE_KEY;
use const SORT_STRING;

class GelfLoggerPluginSslOptions
{
    public const VERIFY_PEER = 'verifyPeer';
    public const ALLOW_SELF_SIGNED = 'allowSelfSigned';
    public const CA_FILE = 'caFile';
    public const CIPHERS = 'ciphers';
    public const USE_SSL = 'useSsl';

    protected const METADATA = [
        'verifyPeer' => ['type' => 'bool', 'default' => true, 'mappingPolicy' => [], 'mappingPolicyValue' => 'verifyPeer'],
        'allowSelfSigned' => [
            'type' => 'bool',
            'default' => false,
            'mappingPolicy' => [],
            'mappingPolicyValue' => 'allowSelfSigned',
        ],
        'caFile' => ['type' => 'string', 'default' => null, 'mappingPolicy' => [], 'mappingPolicyValue' => 'caFile'],
        'ciphers' => ['type' => 'string', 'default' => null, 'mappingPolicy' => [], 'mappingPolicyValue' => 'ciphers'],
        'useSsl' => ['type' => 'bool', 'default' => false, 'mappingPolicy' => [], 'mappingPolicyValue' => 'useSsl'],
    ];

    protected array $updateMap = [];

    /** Enable certificate validation of remote party */
    protected bool $verifyPeer = true;

    /** Allow self-signed certificates */
    protected bool $allowSelfSigned = false;

    /** Path to custom CA */
    protected ?string $caFile = null;

    /** List of ciphers the SSL layer may use. Formatted as specified in ciphers(1) */
    protected ?string $ciphers = null;

    /** Whenever to use Gelf\Transport\SslOptions */
    protected bool $useSsl = false;

    protected function setupDateTimeProperty($propertyName): void
    {
        if (self::METADATA[$propertyName]['type'] === 'datetime' && $this->$propertyName === null) {
            $value = self::METADATA[$propertyName]['default'] ?: 'now';
            $datetime = new DateTime($value);
            $timezone = self::METADATA[$propertyName]['timezone'] ?? null;
            if ($timezone !== null) {
                $timezone = new DateTimeZone($timezone);
                $datetime = new DateTime($value, $timezone);
            }
            $this->$propertyName = $datetime;
        }
    }

    public function isNew(): bool
    {
        return empty($this->updateMap) === true;
    }

    public function listModifiedProperties(): array
    {
        $sorted = array_keys($this->updateMap);
        sort($sorted, SORT_STRING);
        return $sorted;
    }

    public function modifiedToArray(): array
    {
        $data = $this->toArray();
        $modifiedProperties = $this->listModifiedProperties();

        return array_filter($data, function ($key) use ($modifiedProperties) {
            return in_array($key, $modifiedProperties);
        }, ARRAY_FILTER_USE_KEY);
    }

    protected function setupPopoProperty($propertyName): void
    {
        if (self::METADATA[$propertyName]['type'] === 'popo' && $this->$propertyName === null) {
            $popo = self::METADATA[$propertyName]['default'];
            $this->$propertyName = new $popo;
        }
    }

    public function requireAll(): self
    {
        $errors = [];

        try {
            $this->requireVerifyPeer();
        }
        catch (Throwable $throwable) {
            $errors['verifyPeer'] = $throwable->getMessage();
        }
        try {
            $this->requireAllowSelfSigned();
        }
        catch (Throwable $throwable) {
            $errors['allowSelfSigned'] = $throwable->getMessage();
        }
        try {
            $this->requireCaFile();
        }
        catch (Throwable $throwable) {
            $errors['caFile'] = $throwable->getMessage();
        }
        try {
            $this->requireCiphers();
        }
        catch (Throwable $throwable) {
            $errors['ciphers'] = $throwable->getMessage();
        }
        try {
            $this->requireUseSsl();
        }
        catch (Throwable $throwable) {
            $errors['useSsl'] = $throwable->getMessage();
        }

        if (empty($errors) === false) {
            throw new UnexpectedValueException(
                implode("\n", $errors)
            );
        }

        return $this;
    }

    public function fromArray(array $data): self
    {
        $metadata = [
            'verifyPeer' => 'verifyPeer',
            'allowSelfSigned' => 'allowSelfSigned',
            'caFile' => 'caFile',
            'ciphers' => 'ciphers',
            'useSsl' => 'useSsl',
        ];



        foreach ($metadata as $name => $mappedName) {
            $meta = self::METADATA[$name];
            $value = $data[$mappedName] ?? $this->$name ?? null;
            $popoValue = $meta['default'];

            if ($popoValue !== null && $meta['type'] === 'popo') {
                $popo = new $popoValue;

                if (is_array($value)) {
                    $popo->fromArray($value);
                }

                $value = $popo;
            }

            if ($meta['type'] === 'datetime') {
                if (($value instanceof DateTime) === false) {
                    $datetime = new DateTime($data[$name] ?? $meta['default'] ?: 'now');
                    $timezone = $meta['timezone'] ?? null;
                    if ($timezone !== null) {
                        $timezone = new DateTimeZone($timezone);
                        $datetime = new DateTime($data[$name] ?? self::METADATA[$name]['default'] ?: 'now', $timezone);
                    }
                    $value = $datetime;
                }
            }

            if ($meta['type'] === 'array' && isset($meta['itemIsPopo']) && $meta['itemIsPopo']) {
                $className = $meta['itemType'];

                $valueCollection = [];
                foreach ($value as $popoKey => $popoValue) {
                    $popo = new $className;
                    $popo->fromArray($popoValue);

                    $valueCollection[] = $popo;
                }

                $value = $valueCollection;
            }

            $this->$name = $value;
            if (array_key_exists($mappedName, $data)) {
                $this->updateMap[$name] = true;
            }
        }

        return $this;
    }

    public function fromMappedArray(array $data, ...$mappings): self
    {
        $result = [];
        foreach (self::METADATA as $name => $propertyMetadata) {
            $mappingPolicyValue = $propertyMetadata['mappingPolicyValue'];
            $inputKey = $this->mapKeyName($mappings, $mappingPolicyValue);
            $value = $data[$inputKey] ?? null;

            if (self::METADATA[$name]['type'] === 'popo') {
                $popo = self::METADATA[$name]['default'];
                $value = $this->$name !== null
                    ? $this->$name->fromMappedArray($value ?? [], ...$mappings)
                    : (new $popo)->fromMappedArray($value ?? [], ...$mappings);
                $value = $value->toArray();
            }

            $result[$mappingPolicyValue] = $value;
        }

        $this->fromArray($result);

        return $this;
    }

    public function toArray(): array
    {
        $metadata = [
            'verifyPeer' => 'verifyPeer',
            'allowSelfSigned' => 'allowSelfSigned',
            'caFile' => 'caFile',
            'ciphers' => 'ciphers',
            'useSsl' => 'useSsl',
        ];

        $data = [];

        foreach ($metadata as $name => $mappedName) {
            $value = $this->$name;

            if (self::METADATA[$name]['type'] === 'popo') {
                $popo = self::METADATA[$name]['default'];
                $value = $this->$name !== null ? $this->$name->toArray() : (new $popo)->toArray();
            }

            if (self::METADATA[$name]['type'] === 'datetime') {
                if (($value instanceof DateTime) === false) {
                    $datetime = new DateTime(self::METADATA[$name]['default'] ?: 'now');
                    $timezone = self::METADATA[$name]['timezone'] ?? null;
                    if ($timezone !== null) {
                        $timezone = new DateTimeZone($timezone);
                        $datetime = new DateTime($this->$name ?? self::METADATA[$name]['default'] ?: 'now', $timezone);
                    }
                    $value = $datetime;
                }

                $value = $value->format(self::METADATA[$name]['format']);
            }

            if (self::METADATA[$name]['type'] === 'array' && isset(self::METADATA[$name]['itemIsPopo']) && self::METADATA[$name]['itemIsPopo']) {
                $valueCollection = [];
                foreach ($value as $popo) {
                    $valueCollection[] = $popo->toArray();
                }

                $value = $valueCollection;
            }

            $data[$mappedName] = $value;
        }



        return $data;
    }

    public function toMappedArray(...$mappings): array
    {
        return $this->map($this->toArray(), $mappings);
    }

    protected function map(array $data, array $mappings): array
    {
        $result = [];
        foreach (self::METADATA as $name => $propertyMetadata) {
            $value = $data[$propertyMetadata['mappingPolicyValue']];

            if (self::METADATA[$name]['type'] === 'popo') {
                $popo = self::METADATA[$name]['default'];
                $value = $this->$name !== null ? $this->$name->toMappedArray(...$mappings) : (new $popo)->toMappedArray(...$mappings);
            }

            $key = $this->mapKeyName($mappings, $propertyMetadata['mappingPolicyValue']);
            $result[$key] = $value;
        }

        return $result;
    }

    protected function mapKeyName(array $mappings, string $key): string
    {
        static $mappingPolicy = [];

        if (empty($mappingPolicy)) {

            $mappingPolicy['none'] =
                static function (string $key): string {
                    return $key;
                };

            $mappingPolicy['lower'] =
                static function (string $key): string {
                    return mb_strtolower($key);
                };

            $mappingPolicy['upper'] =
                static function (string $key): string {
                    return mb_strtoupper($key);
                };

            $mappingPolicy['snake-to-camel'] =
                static function (string $key): string {
                    $stringTokens = explode('_', mb_strtolower($key));
                $camelizedString = array_shift($stringTokens);
                foreach ($stringTokens as $token) {
                    $camelizedString .= ucfirst($token);
                }

                return $camelizedString;
                };

            $mappingPolicy['camel-to-snake'] =
                static function (string $key): string {
                    $camelizedStringTokens = preg_split('/(?<=[^A-Z])(?=[A-Z])/', $key);
                if ($camelizedStringTokens !== false && count($camelizedStringTokens) > 0) {
                    $key = mb_strtolower(implode('_', $camelizedStringTokens));
                }

                return $key;
                };

        }

        foreach ($mappings as $mappingIndex => $mappingType) {
            if (!array_key_exists($mappingType, $mappingPolicy)) {
                continue;
            }

            $key = $mappingPolicy[$mappingType]($key);
        }

        return $key;
    }

    public function toArrayLower(): array
    {
        return $this->toMappedArray('lower');
    }

    public function toArrayUpper(): array
    {
        return $this->toMappedArray('upper');
    }

    public function toArraySnakeToCamel(): array
    {
        return $this->toMappedArray('snake-to-camel');
    }

    public function toArrayCamelToSnake(): array
    {
        return $this->toMappedArray('camel-to-snake');
    }

    /**
     * Enable certificate validation of remote party
     */
    public function verifyPeer(): ?bool
    {
        return $this->verifyPeer;
    }

    public function hasVerifyPeer(): bool
    {
        return $this->verifyPeer !== null;
    }

    /**
     * Enable certificate validation of remote party
     */
    public function requireVerifyPeer(): bool
    {
        $this->setupPopoProperty('verifyPeer');
        $this->setupDateTimeProperty('verifyPeer');

        if ($this->verifyPeer === null) {
            throw new UnexpectedValueException('Required value of "verifyPeer" has not been set');
        }
        return $this->verifyPeer;
    }

    /**
     * Enable certificate validation of remote party
     */
    public function setVerifyPeer(bool $verifyPeer): self
    {
        $this->verifyPeer = $verifyPeer; $this->updateMap['verifyPeer'] = true; return $this;
    }

    /**
     * Allow self-signed certificates
     */
    public function allowSelfSigned(): ?bool
    {
        return $this->allowSelfSigned;
    }

    public function hasAllowSelfSigned(): bool
    {
        return $this->allowSelfSigned !== null;
    }

    /**
     * Allow self-signed certificates
     */
    public function requireAllowSelfSigned(): bool
    {
        $this->setupPopoProperty('allowSelfSigned');
        $this->setupDateTimeProperty('allowSelfSigned');

        if ($this->allowSelfSigned === null) {
            throw new UnexpectedValueException('Required value of "allowSelfSigned" has not been set');
        }
        return $this->allowSelfSigned;
    }

    /**
     * Allow self-signed certificates
     */
    public function setAllowSelfSigned(bool $allowSelfSigned): self
    {
        $this->allowSelfSigned = $allowSelfSigned; $this->updateMap['allowSelfSigned'] = true; return $this;
    }

    /**
     * Path to custom CA
     */
    public function getCaFile(): ?string
    {
        return $this->caFile;
    }

    public function hasCaFile(): bool
    {
        return $this->caFile !== null;
    }

    /**
     * Path to custom CA
     */
    public function requireCaFile(): string
    {
        $this->setupPopoProperty('caFile');
        $this->setupDateTimeProperty('caFile');

        if ($this->caFile === null) {
            throw new UnexpectedValueException('Required value of "caFile" has not been set');
        }
        return $this->caFile;
    }

    /**
     * Path to custom CA
     */
    public function setCaFile(?string $caFile): self
    {
        $this->caFile = $caFile; $this->updateMap['caFile'] = true; return $this;
    }

    /**
     * List of ciphers the SSL layer may use. Formatted as specified in ciphers(1)
     */
    public function getCiphers(): ?string
    {
        return $this->ciphers;
    }

    public function hasCiphers(): bool
    {
        return $this->ciphers !== null;
    }

    /**
     * List of ciphers the SSL layer may use. Formatted as specified in ciphers(1)
     */
    public function requireCiphers(): string
    {
        $this->setupPopoProperty('ciphers');
        $this->setupDateTimeProperty('ciphers');

        if ($this->ciphers === null) {
            throw new UnexpectedValueException('Required value of "ciphers" has not been set');
        }
        return $this->ciphers;
    }

    /**
     * List of ciphers the SSL layer may use. Formatted as specified in ciphers(1)
     */
    public function setCiphers(?string $ciphers): self
    {
        $this->ciphers = $ciphers; $this->updateMap['ciphers'] = true; return $this;
    }

    /**
     * Whenever to use Gelf\Transport\SslOptions
     */
    public function useSsl(): ?bool
    {
        return $this->useSsl;
    }

    public function hasUseSsl(): bool
    {
        return $this->useSsl !== null;
    }

    /**
     * Whenever to use Gelf\Transport\SslOptions
     */
    public function requireUseSsl(): bool
    {
        $this->setupPopoProperty('useSsl');
        $this->setupDateTimeProperty('useSsl');

        if ($this->useSsl === null) {
            throw new UnexpectedValueException('Required value of "useSsl" has not been set');
        }
        return $this->useSsl;
    }

    /**
     * Whenever to use Gelf\Transport\SslOptions
     */
    public function setUseSsl(bool $useSsl): self
    {
        $this->useSsl = $useSsl; $this->updateMap['useSsl'] = true; return $this;
    }
}

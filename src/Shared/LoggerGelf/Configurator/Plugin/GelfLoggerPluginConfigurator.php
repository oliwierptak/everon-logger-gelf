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

class GelfLoggerPluginConfigurator
{
    public const HTTP_CONFIGURATOR = 'httpConfigurator';
    public const TCP_CONFIGURATOR = 'tcpConfigurator';
    public const UDP_CONFIGURATOR = 'udpConfigurator';

    protected const METADATA = [
        'httpConfigurator' => [
            'type' => 'popo',
            'default' => \Everon\Shared\LoggerGelf\Configurator\Plugin\GelfHttpLoggerPluginConfigurator::class,
            'mappingPolicy' => [],
            'mappingPolicyValue' => 'httpConfigurator',
        ],
        'tcpConfigurator' => [
            'type' => 'popo',
            'default' => \Everon\Shared\LoggerGelf\Configurator\Plugin\GelfTcpLoggerPluginConfigurator::class,
            'mappingPolicy' => [],
            'mappingPolicyValue' => 'tcpConfigurator',
        ],
        'udpConfigurator' => [
            'type' => 'popo',
            'default' => \Everon\Shared\LoggerGelf\Configurator\Plugin\GelfUdpLoggerPluginConfigurator::class,
            'mappingPolicy' => [],
            'mappingPolicyValue' => 'udpConfigurator',
        ],
    ];

    protected array $updateMap = [];

    /** HTTP related options. */
    protected ?GelfHttpLoggerPluginConfigurator $httpConfigurator = null;

    /** TCP related options. */
    protected ?GelfTcpLoggerPluginConfigurator $tcpConfigurator = null;

    /** UDP related options. */
    protected ?GelfUdpLoggerPluginConfigurator $udpConfigurator = null;

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
            $this->requireHttpConfigurator();
        }
        catch (Throwable $throwable) {
            $errors['httpConfigurator'] = $throwable->getMessage();
        }
        try {
            $this->requireTcpConfigurator();
        }
        catch (Throwable $throwable) {
            $errors['tcpConfigurator'] = $throwable->getMessage();
        }
        try {
            $this->requireUdpConfigurator();
        }
        catch (Throwable $throwable) {
            $errors['udpConfigurator'] = $throwable->getMessage();
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
            'httpConfigurator' => 'httpConfigurator',
            'tcpConfigurator' => 'tcpConfigurator',
            'udpConfigurator' => 'udpConfigurator',
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
            'httpConfigurator' => 'httpConfigurator',
            'tcpConfigurator' => 'tcpConfigurator',
            'udpConfigurator' => 'udpConfigurator',
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
     * HTTP related options.
     */
    public function getHttpConfigurator(): ?GelfHttpLoggerPluginConfigurator
    {
        return $this->httpConfigurator;
    }

    public function hasHttpConfigurator(): bool
    {
        return $this->httpConfigurator !== null;
    }

    /**
     * HTTP related options.
     */
    public function requireHttpConfigurator(): GelfHttpLoggerPluginConfigurator
    {
        $this->setupPopoProperty('httpConfigurator');
        $this->setupDateTimeProperty('httpConfigurator');

        if ($this->httpConfigurator === null) {
            throw new UnexpectedValueException('Required value of "httpConfigurator" has not been set');
        }
        return $this->httpConfigurator;
    }

    /**
     * HTTP related options.
     */
    public function setHttpConfigurator(?GelfHttpLoggerPluginConfigurator $httpConfigurator): self
    {
        $this->httpConfigurator = $httpConfigurator; $this->updateMap['httpConfigurator'] = true; return $this;
    }

    /**
     * TCP related options.
     */
    public function getTcpConfigurator(): ?GelfTcpLoggerPluginConfigurator
    {
        return $this->tcpConfigurator;
    }

    public function hasTcpConfigurator(): bool
    {
        return $this->tcpConfigurator !== null;
    }

    /**
     * TCP related options.
     */
    public function requireTcpConfigurator(): GelfTcpLoggerPluginConfigurator
    {
        $this->setupPopoProperty('tcpConfigurator');
        $this->setupDateTimeProperty('tcpConfigurator');

        if ($this->tcpConfigurator === null) {
            throw new UnexpectedValueException('Required value of "tcpConfigurator" has not been set');
        }
        return $this->tcpConfigurator;
    }

    /**
     * TCP related options.
     */
    public function setTcpConfigurator(?GelfTcpLoggerPluginConfigurator $tcpConfigurator): self
    {
        $this->tcpConfigurator = $tcpConfigurator; $this->updateMap['tcpConfigurator'] = true; return $this;
    }

    /**
     * UDP related options.
     */
    public function getUdpConfigurator(): ?GelfUdpLoggerPluginConfigurator
    {
        return $this->udpConfigurator;
    }

    public function hasUdpConfigurator(): bool
    {
        return $this->udpConfigurator !== null;
    }

    /**
     * UDP related options.
     */
    public function requireUdpConfigurator(): GelfUdpLoggerPluginConfigurator
    {
        $this->setupPopoProperty('udpConfigurator');
        $this->setupDateTimeProperty('udpConfigurator');

        if ($this->udpConfigurator === null) {
            throw new UnexpectedValueException('Required value of "udpConfigurator" has not been set');
        }
        return $this->udpConfigurator;
    }

    /**
     * UDP related options.
     */
    public function setUdpConfigurator(?GelfUdpLoggerPluginConfigurator $udpConfigurator): self
    {
        $this->udpConfigurator = $udpConfigurator; $this->updateMap['udpConfigurator'] = true; return $this;
    }
}

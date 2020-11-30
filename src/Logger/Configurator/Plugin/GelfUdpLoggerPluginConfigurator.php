<?php declare(strict_types = 1);

namespace Everon\Logger\Configurator\Plugin;

use InvalidArgumentException;
use UnexpectedValueException;
use function array_key_exists;
use function ctype_upper;
use function is_array;
use function is_object;
use function method_exists;
use function sprintf;
use function strtolower;
use function trim;

/**
 * Code generated by POPO generator, do not edit.
 * https://packagist.org/packages/popo/generator
 */
class GelfUdpLoggerPluginConfigurator extends \Everon\Logger\Plugin\Gelf\AbstractGelfPluginConfigurator
{
    protected array $data = [
        'pluginClass' => \Everon\Logger\Plugin\GelfUdp\GelfUdpLoggerPlugin::class,
        'pluginFactoryClass' => null,
        'logLevel' => 'debug',
        'shouldBubble' => true,
        'ignoreTransportErrors' => true,
        'host' => \Gelf\Transport\UdpTransport::DEFAULT_HOST,
        'port' => \Gelf\Transport\UdpTransport::DEFAULT_PORT,
        'chunkSize' => \Gelf\Transport\UdpTransport::CHUNK_SIZE_WAN,
    ];

    protected array $default = [
        'pluginClass' => \Everon\Logger\Plugin\GelfUdp\GelfUdpLoggerPlugin::class,
        'pluginFactoryClass' => null,
        'logLevel' => 'debug',
        'shouldBubble' => true,
        'ignoreTransportErrors' => true,
        'host' => \Gelf\Transport\UdpTransport::DEFAULT_HOST,
        'port' => \Gelf\Transport\UdpTransport::DEFAULT_PORT,
        'chunkSize' => \Gelf\Transport\UdpTransport::CHUNK_SIZE_WAN,
    ];

    protected array $propertyMapping = [
        'pluginClass' => 'string',
        'pluginFactoryClass' => 'string',
        'logLevel' => 'string',
        'shouldBubble' => 'bool',
        'ignoreTransportErrors' => 'bool',
        'host' => 'string',
        'port' => 'int',
        'chunkSize' => 'int',
    ];

    protected array $collectionItems = [
    ];

    protected array $updateMap = [];

    /**
     * @param string $property
     *
     * @return mixed|null
     */
    protected function popoGetValue(string $property)
    {
        if (!isset($this->data[$property])) {
            if ($this->typeIsObject($this->propertyMapping[$property])) {
                $popo = new $this->propertyMapping[$property];
                $this->data[$property] = $popo;
            }
            else {
                return null;
            }
        }

        return $this->data[$property];
    }

    /**
     * @param string $property
     * @param mixed $value
     *
     * @return void
     */
    protected function popoSetValue(string $property, $value): void
    {
        $this->data[$property] = $value;

        $this->updateMap[$property] = true;
    }

    /**
     * @param string $property
     *
     * @return void
     * @throws UnexpectedValueException
     */
    protected function assertPropertyValue(string $property): void
    {
        if (!isset($this->data[$property])) {
            throw new UnexpectedValueException(sprintf(
                'Required value of "%s" has not been set',
                $property
            ));
        }
    }

    /**
     * @param string $propertyName
     * @param mixed $value
     *
     * @return void
     * @throws \InvalidArgumentException
     */
    protected function addCollectionItem(string $propertyName, $value): void
    {
        $type = trim(strtolower($this->propertyMapping[$propertyName]));
        $collection = $this->popoGetValue($propertyName) ?? [];

        if (!is_array($collection) || $type !== 'array') {
            throw new InvalidArgumentException('Cannot add item to non array type: ' . $propertyName);
        }

        $collection[] = $value;

        $this->popoSetValue($propertyName, $collection);
    }

    public function toArray(): array
    {
        $data = [];

        foreach ($this->propertyMapping as $key => $type) {
            if (!array_key_exists($key, $data)) {
                $data[$key] = $this->default[$key] ?? null;
            }
            $value = $this->data[$key];

            if ($this->isCollectionItem($key) && is_array($value)) {
                foreach ($value as $popo) {
                    if (is_object($popo) && method_exists($popo, 'toArray')) {
                        $data[$key][] = $popo->toArray();
                    }
                }

                continue;
            }

            if (is_object($value) && method_exists($value, 'toArray')) {
                $data[$key] = $value->toArray();
                continue;
            }

            $data[$key] = $value;
        }

        return $data;
    }

    public function fromArray(array $data): GelfUdpLoggerPluginConfigurator
    {
        foreach ($this->propertyMapping as $key => $type) {
            $result[$key] = $this->default[$key] ?? null;

            if ($this->typeIsObject($type)) {
                $popo = new $this->propertyMapping[$key];
                if (method_exists($popo, 'fromArray')) {
                    $popoData = $data[$key] ?? $this->default[$key] ?? [];
                    $popo->fromArray($popoData);
                }
                $result[$key] = $popo;

                continue;
            }

            if (array_key_exists($key, $data)) {
                if ($this->isCollectionItem($key)) {
                    foreach ($data[$key] as $popoData) {
                        $popo = new $this->collectionItems[$key]();
                        if (method_exists($popo, 'fromArray')) {
                            $popo->fromArray($popoData);
                        }
                        $result[$key][] = $popo;
                    }
                }
                else {
                    $result[$key] = $data[$key];
                }
            }
        }

        $this->data = $result;

        foreach ($data as $key => $value) {
            if (!array_key_exists($key, $result)) {
                continue;
            }

            $type = $this->propertyMapping[$key] ?? null;
            if ($type !== null) {
                $value = $this->typecastValue($type, $result[$key]);
                $this->popoSetValue($key, $value);
            }
        }

        return $this;
    }

    /**
     * @param string $type
     * @param mixed $value
     *
     * @return mixed
     */
    protected function typecastValue(string $type, $value)
    {
        if ($value === null) {
            return $value;
        }

        switch ($type) {
            case 'int':
                $value = (int) $value;
                break;
            case 'string':
                $value = (string) $value;
                break;
            case 'bool':
                $value = (bool) $value;
                break;
            case 'array':
                $value = (array) $value;
                break;
        }

        return $value;
    }

    protected function isCollectionItem(string $key): bool
    {
        return array_key_exists($key, $this->collectionItems);
    }

    protected function typeIsObject(string $value): bool
    {
        return $value[0] === '\\' && ctype_upper($value[1]);
    }

    public function isNew(): bool
    {
        return empty($this->updateMap);
    }

    /**
     * @return string|null
     */
    public function getPluginClass(): ?string
    {
        return $this->popoGetValue('pluginClass');
    }

    /**
     * @param string|null $pluginClass
     *
     * @return GelfUdpLoggerPluginConfigurator
     */
    public function setPluginClass(?string $pluginClass): GelfUdpLoggerPluginConfigurator
    {
        $this->popoSetValue('pluginClass', $pluginClass);

        return $this;
    }

    /**
     * Throws exception if value is null.
     *
     * @return string
     * @throws \UnexpectedValueException
     *
     */
    public function requirePluginClass(): string
    {
        $this->assertPropertyValue('pluginClass');

        return (string) $this->popoGetValue('pluginClass');
    }

    /**
     * Returns true if value was set to any value, ignores defaults.
     *
     * @return bool
     */
    public function hasPluginClass(): bool
    {
        return $this->updateMap['pluginClass'] ?? false;
    }

    /**
     * @return string|null Defines custom plugin factory to be used to create a plugin
     */
    public function getPluginFactoryClass(): ?string
    {
        return $this->popoGetValue('pluginFactoryClass');
    }

    /**
     * @param string|null $pluginFactoryClass Defines custom plugin factory to be used to create a plugin
     *
     * @return GelfUdpLoggerPluginConfigurator
     */
    public function setPluginFactoryClass(?string $pluginFactoryClass): GelfUdpLoggerPluginConfigurator
    {
        $this->popoSetValue('pluginFactoryClass', $pluginFactoryClass);

        return $this;
    }

    /**
     * Throws exception if value is null.
     *
     * @return string Defines custom plugin factory to be used to create a plugin
     * @throws \UnexpectedValueException
     *
     */
    public function requirePluginFactoryClass(): string
    {
        $this->assertPropertyValue('pluginFactoryClass');

        return (string) $this->popoGetValue('pluginFactoryClass');
    }

    /**
     * Returns true if value was set to any value, ignores defaults.
     *
     * @return bool
     */
    public function hasPluginFactoryClass(): bool
    {
        return $this->updateMap['pluginFactoryClass'] ?? false;
    }

    /**
     * @return string|null The minimum logging level at which this handler will be triggered
     */
    public function getLogLevel(): ?string
    {
        return $this->popoGetValue('logLevel');
    }

    /**
     * @param string|null $logLevel The minimum logging level at which this handler will be triggered
     *
     * @return GelfUdpLoggerPluginConfigurator
     */
    public function setLogLevel(?string $logLevel): GelfUdpLoggerPluginConfigurator
    {
        $this->popoSetValue('logLevel', $logLevel);

        return $this;
    }

    /**
     * Throws exception if value is null.
     *
     * @return string The minimum logging level at which this handler will be triggered
     * @throws \UnexpectedValueException
     *
     */
    public function requireLogLevel(): string
    {
        $this->assertPropertyValue('logLevel');

        return (string) $this->popoGetValue('logLevel');
    }

    /**
     * Returns true if value was set to any value, ignores defaults.
     *
     * @return bool
     */
    public function hasLogLevel(): bool
    {
        return $this->updateMap['logLevel'] ?? false;
    }

    /**
     * @return boolean|null Whether the messages that are handled can bubble up the stack or not
     */
    public function shouldBubble(): ?bool
    {
        return $this->popoGetValue('shouldBubble');
    }

    /**
     * @param boolean|null $shouldBubble Whether the messages that are handled can bubble up the stack or not
     *
     * @return GelfUdpLoggerPluginConfigurator
     */
    public function setShouldBubble(?bool $shouldBubble): GelfUdpLoggerPluginConfigurator
    {
        $this->popoSetValue('shouldBubble', $shouldBubble);

        return $this;
    }

    /**
     * Throws exception if value is null.
     *
     * @return boolean Whether the messages that are handled can bubble up the stack or not
     * @throws \UnexpectedValueException
     *
     */
    public function requireShouldBubble(): bool
    {
        $this->assertPropertyValue('shouldBubble');

        return (bool) $this->popoGetValue('shouldBubble');
    }

    /**
     * Returns true if value was set to any value, ignores defaults.
     *
     * @return bool
     */
    public function hasShouldBubble(): bool
    {
        return $this->updateMap['shouldBubble'] ?? false;
    }

    /**
     * @return boolean|null A wrapper for any AbstractTransport to ignore any kind of errors
     */
    public function ignoreTransportErrors(): ?bool
    {
        return $this->popoGetValue('ignoreTransportErrors');
    }

    /**
     * @param boolean|null $ignoreTransportErrors A wrapper for any AbstractTransport to ignore any kind of errors
     *
     * @return GelfUdpLoggerPluginConfigurator
     */
    public function setIgnoreTransportErrors(?bool $ignoreTransportErrors): GelfUdpLoggerPluginConfigurator
    {
        $this->popoSetValue('ignoreTransportErrors', $ignoreTransportErrors);

        return $this;
    }

    /**
     * Throws exception if value is null.
     *
     * @return boolean A wrapper for any AbstractTransport to ignore any kind of errors
     * @throws \UnexpectedValueException
     *
     */
    public function requireIgnoreTransportErrors(): bool
    {
        $this->assertPropertyValue('ignoreTransportErrors');

        return (bool) $this->popoGetValue('ignoreTransportErrors');
    }

    /**
     * Returns true if value was set to any value, ignores defaults.
     *
     * @return bool
     */
    public function hasIgnoreTransportErrors(): bool
    {
        return $this->updateMap['ignoreTransportErrors'] ?? false;
    }

    /**
     * @return string|null when NULL or empty DEFAULT_HOST is used
     */
    public function getHost(): ?string
    {
        return $this->popoGetValue('host');
    }

    /**
     * @param string|null $host when NULL or empty DEFAULT_HOST is used
     *
     * @return GelfUdpLoggerPluginConfigurator
     */
    public function setHost(?string $host): GelfUdpLoggerPluginConfigurator
    {
        $this->popoSetValue('host', $host);

        return $this;
    }

    /**
     * Throws exception if value is null.
     *
     * @return string when NULL or empty DEFAULT_HOST is used
     * @throws \UnexpectedValueException
     *
     */
    public function requireHost(): string
    {
        $this->assertPropertyValue('host');

        return (string) $this->popoGetValue('host');
    }

    /**
     * Returns true if value was set to any value, ignores defaults.
     *
     * @return bool
     */
    public function hasHost(): bool
    {
        return $this->updateMap['host'] ?? false;
    }

    /**
     * @return integer|null when NULL or empty DEFAULT_PORT is used
     */
    public function getPort(): ?int
    {
        return $this->popoGetValue('port');
    }

    /**
     * @param integer|null $port when NULL or empty DEFAULT_PORT is used
     *
     * @return GelfUdpLoggerPluginConfigurator
     */
    public function setPort(?int $port): GelfUdpLoggerPluginConfigurator
    {
        $this->popoSetValue('port', $port);

        return $this;
    }

    /**
     * Throws exception if value is null.
     *
     * @return integer when NULL or empty DEFAULT_PORT is used
     * @throws \UnexpectedValueException
     *
     */
    public function requirePort(): int
    {
        $this->assertPropertyValue('port');

        return (int) $this->popoGetValue('port');
    }

    /**
     * Returns true if value was set to any value, ignores defaults.
     *
     * @return bool
     */
    public function hasPort(): bool
    {
        return $this->updateMap['port'] ?? false;
    }

    /**
     * @return integer|null defaults to CHUNK_SIZE_WAN, 0 disables chunks completely
     */
    public function getChunkSize(): ?int
    {
        return $this->popoGetValue('chunkSize');
    }

    /**
     * @param integer|null $chunkSize defaults to CHUNK_SIZE_WAN, 0 disables chunks completely
     *
     * @return GelfUdpLoggerPluginConfigurator
     */
    public function setChunkSize(?int $chunkSize): GelfUdpLoggerPluginConfigurator
    {
        $this->popoSetValue('chunkSize', $chunkSize);

        return $this;
    }

    /**
     * Throws exception if value is null.
     *
     * @return integer defaults to CHUNK_SIZE_WAN, 0 disables chunks completely
     * @throws \UnexpectedValueException
     *
     */
    public function requireChunkSize(): int
    {
        $this->assertPropertyValue('chunkSize');

        return (int) $this->popoGetValue('chunkSize');
    }

    /**
     * Returns true if value was set to any value, ignores defaults.
     *
     * @return bool
     */
    public function hasChunkSize(): bool
    {
        return $this->updateMap['chunkSize'] ?? false;
    }
}

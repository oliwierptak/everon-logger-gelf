# EveronLoggerGelf

[![Build and run tests](https://github.com/oliwierptak/everon-logger-gelf/actions/workflows/main.yml/badge.svg)](https://github.com/oliwierptak/everon-logger-gelf/actions/workflows/main.yml)

A plugin with [Graylog2](https://github.com/bzikarsky/gelf-php) handler
for [EveronLogger](https://github.com/oliwierptak/everon-logger).

- GelfHttp
- GelfTcp
- GelfUdp

_Note:_ Gelf offers several transport protocols, and could be configured via related properties
of `GelfLoggerPluginConfigurator`.

## Plugins

### GelfHttp

- Configurator

  `Everon\Shared\LoggerGelf\Configurator\Plugin\GelfHttpLoggerPluginConfigurator`

- Default Options

    ```php
    'pluginClass' => \Everon\LoggerGelf\Plugin\GelfHttp\GelfHttpLoggerPlugin::class,
    'pluginFactoryClass' => NULL,
    'logLevel' => \Monolog\Level::Debug,
    'shouldBubble' => true,
    'ignoreTransportErrors' => true,
    'host' => '127.0.0.1',
    'port' => 12202,
    'path' => '/gelf',
    'sslOptions' => NULL,
    ```

- Plugin

  `Everon\LoggerGelf\Plugin\GelfHttp\GelfHttpLoggerPlugin`

### GelfTcp

- Configurator

  `Everon\Shared\LoggerGelf\Configurator\Plugin\GelfTcpLoggerPluginConfigurator`

- Default Options

    ```php
    'pluginClass' => \Everon\LoggerGelf\Plugin\GelfTcp\GelfTcpLoggerPlugin::class,
    'pluginFactoryClass' => NULL,
    'logLevel' => \Monolog\Level::Debug,
    'shouldBubble' => true,
    'ignoreTransportErrors' => true,
    'host' => '127.0.0.1',
    'port' => 12201,
    'sslOptions' => NULL,
    ```

- Plugin

  `Everon\LoggerGelf\Plugin\GelfTcp\GelfTcpLoggerPlugin`

### GelfUdp

- Configurator

  `Everon\Shared\LoggerGelf\Configurator\Plugin\GelfUdpLoggerPluginConfigurator`

- Default Options for `GelfUdpLoggerPluginConfigurator`

    ```php
    'pluginClass' => \Everon\LoggerGelf\Plugin\GelfUdp\GelfUdpLoggerPlugin::class,
    'pluginFactoryClass' => NULL,
    'logLevel' => \Monolog\Level::Debug,
    'shouldBubble' => true,
    'ignoreTransportErrors' => true,
    'host' => '127.0.0.1',
    'port' => 12201,
    'chunkSize' => \Gelf\Transport\UdpTransport::CHUNK_SIZE_WAN,
    ```

- Plugin

  `Everon\LoggerGelf\Plugin\GelfUdp\GelfUdpLoggerPlugin`

### Gelf SSL Options

- Default Options for `GelfLoggerPluginSslOptions`

    ```php
    'verifyPeer' => true,
    'allowSelfSigned' => false,
    'caFile' => NULL,
    'ciphers' => NULL,
    'useSsl' => false,
    ```

- Usage

    ```php
    use Everon\Shared\Logger\Configurator\Plugin\LoggerConfigurator;
    use Everon\Logger\EveronLoggerFacade;
    use Everon\Shared\LoggerGelf\Configurator\Plugin\GelfHttpLoggerPluginConfigurator;
    use Everon\Shared\LoggerGelf\Configurator\Plugin\GelfTcpLoggerPluginConfigurator;
    use Everon\Shared\LoggerGelf\Configurator\Plugin\GelfUdpLoggerPluginConfigurator;
    use Monolog\Level;
  
    $gelfHttpPluginConfigurator = (new GelfHttpLoggerPluginConfigurator)
        ->setLogLevel(Level::Debug)
        ->setHost('graylog.host.http');
  
    $gelfTcpPluginConfigurator = (new GelfTcpLoggerPluginConfigurator)
        ->setLogLevel(Level::Warning)
        ->setHost('graylog.host.tcp');
  
    $gelfUdpPluginConfigurator = (new GelfUdpLoggerPluginConfigurator)
        ->setLogLevel(Level::Info)
        ->setHost('graylog.host.udp');
    
    $configurator = (new LoggerConfigurator)
        ->addPluginConfigurator($gelfHttpPluginConfigurator)
        ->addPluginConfigurator($gelfTcpPluginConfigurator)
        ->addPluginConfigurator($gelfUdpPluginConfigurator);
    
    $logger = (new EveronLoggerFacade())->buildLogger($configurator);
    
    $logger->info('lorem ipsum');
    ```

## Requirements

- PHP v8.1.x
- Monolog v3.x

## Installation

```
composer require everon/logger-gelf
```

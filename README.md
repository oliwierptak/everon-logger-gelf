# EveronLoggerGelf

A plugin with [Graylog2](https://github.com/bzikarsky/gelf-php) handler for [EveronLogger](https://github.com/oliwierptak/everon-logger).

- GelfHttp
- GelfTcp
- GelfUdp
 
_Note:_ Gelf offers several transport protocols, and could be configured via related properties of `GelfLoggerPluginConfigurator`.

## Plugins

### GelfHttp
    
- Configurator

    `Everon\Logger\Configurator\Plugin\GelfHttpLoggerPluginConfigurator`
 
- Default Options

    ```php
    'pluginClass' => \Everon\Logger\Plugin\GelfHttp\GelfHttpLoggerPlugin::class,
    'pluginFactoryClass' => NULL,
    'logLevel' => 'debug',
    'shouldBubble' => true,
    'ignoreTransportErrors' => true,
    'host' => \Gelf\Transport\HttpTransport::DEFAULT_HOST,
    'port' => \Gelf\Transport\HttpTransport::DEFAULT_PORT,
    'path' => \Gelf\Transport\HttpTransport::DEFAULT_PATH,
    'sslOptions' => NULL,
    ```
  
- Plugin

  `Everon\Logger\Plugin\GelfHttp\GelfHttpLoggerPlugin`
  

### GelfTcp
    
- Configurator

    `Everon\Logger\Configurator\Plugin\GelfTcpLoggerPluginConfigurator`
   
- Default Options

    ```php
    'pluginClass' => \Everon\Logger\Plugin\GelfTcp\GelfTcpLoggerPlugin::class,
    'pluginFactoryClass' => NULL,
    'logLevel' => 'debug',
    'shouldBubble' => true,
    'ignoreTransportErrors' => true,
    'host' => \Gelf\Transport\TcpTransport::DEFAULT_HOST,
    'port' => \Gelf\Transport\TcpTransport::DEFAULT_PORT,
    'sslOptions' => NULL,
    ```
  
- Plugin

  `Everon\Logger\Plugin\GelfTcp\GelfTcpLoggerPlugin`

  
### GelfUdp
    
- Configurator

    `Everon\Logger\Configurator\Plugin\GelfUdpLoggerPluginConfigurator`
 
- Default Options for `GelfUdpLoggerPluginConfigurator`

    ```php
    'pluginClass' => \Everon\Logger\Plugin\GelfUdp\GelfUdpLoggerPlugin::class,
    'pluginFactoryClass' => NULL,
    'logLevel' => 'debug',
    'shouldBubble' => true,
    'ignoreTransportErrors' => true,
    'host' => \Gelf\Transport\UdpTransport::DEFAULT_HOST,
    'port' => \Gelf\Transport\UdpTransport::DEFAULT_PORT,
    'chunkSize' => \Gelf\Transport\UdpTransport::CHUNK_SIZE_WAN,
    ```
  
- Plugin

  `Everon\Logger\Plugin\GelfUdp\GelfUdpLoggerPlugin`
  
  
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
    use Everon\Logger\Configurator\Plugin\GelfHttpLoggerPluginConfigurator;
    use Everon\Logger\Configurator\Plugin\GelfTcpLoggerPluginConfigurator;
    use Everon\Logger\Configurator\Plugin\GelfUdpLoggerPluginConfigurator;
    use Everon\Logger\Configurator\Plugin\LoggerConfigurator;
    use Everon\Logger\EveronLoggerFacade;
  
    $gelfHttpPluginConfigurator = (new GelfHttpLoggerPluginConfigurator)
        ->setLogLevel('debug')
        ->setHost('graylog.host.http');
  
    $gelfTcpPluginConfigurator = (new GelfTcpLoggerPluginConfigurator)
        ->setLogLevel('warning')
        ->setHost('graylog.host.tcp');
  
    $gelfUdpPluginConfigurator = (new GelfUdpLoggerPluginConfigurator)
        ->setLogLevel('info')
        ->setHost('graylog.host.udp');
    
    $configurator = (new LoggerConfigurator)
        ->addPluginConfigurator($gelfHttpPluginConfigurator)
        ->addPluginConfigurator($gelfTcpPluginConfigurator)
        ->addPluginConfigurator($gelfUdpPluginConfigurator);
    
    $logger = (new EveronLoggerFacade())->buildLogger($configurator);
    
    $logger->info('lorem ipsum');
    ```

## Requirements

- PHP v8.x

_Note_: Use v2.x for compatibility with PHP v7.4.

## Installation

```
composer require everon/logger-gelf
```

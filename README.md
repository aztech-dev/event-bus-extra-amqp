# aztech/event-bus-extra-amqp

## Build status

[![Build Status](https://travis-ci.org/aztech-dev/event-bus-extra-amqp.png?branch=master)](https://travis-ci.org/aztech-dev/event-bus-extra-amqp)
[![Code Coverage](https://scrutinizer-ci.com/g/aztech-dev/event-bus-extra-amqp/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/aztech-dev/event-bus-extra-amqp/?branch=master)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/aztech-dev/event-bus-extra-amqp/badges/quality-score.png?s=668e4df5ba163c804504257d4a026a0a549f220a)](https://scrutinizer-ci.com/g/aztech-dev/event-bus-extra-amqp/)
[![Dependency Status](https://www.versioneye.com/user/projects/53b92a84609ff04f7f000003/badge.svg)](https://www.versioneye.com/user/projects/53b92a84609ff04f7f000003)
[![HHVM Status](http://hhvm.h4cc.de/badge/aztech/event-bus-extra-amqp.png)](http://hhvm.h4cc.de/package/aztech/event-bus-extra-amqp)

## Stability

[![Latest Stable Version](https://poser.pugx.org/aztech/event-bus-extra-amqp/v/stable.png)](https://packagist.org/packages/aztech/event-bus-extra-amqp)
[![Latest Unstable Version](https://poser.pugx.org/aztech/event-bus-extra-amqp/v/unstable.png)](https://packagist.org/packages/aztech/event-bus-extra-amqp)

## Installation

### Via Composer

Composer is the only supported way of installing *aztech/event-bus-extra-amqp* . Don't know Composer yet ? [Read more about it](https://getcomposer.org/doc/00-intro.md).


`$ composer require "aztech/event-bus-extra-amqp":"~1"`

## Autoloading

Add the following code to your bootstrap file :

```php
require_once 'vendor/autoload.php';
```

## Dependencies

  * videlalvaro/php-amqplib : ~2

## Supported elements :

  * Persistent publish
  * Subscribe

## Configuration options & defaults

| Parameter | Default | Description |
|--------------|-------------|-------------------------------------------------------------------------------------------|
| `host` | `127.0.0.1` | Hostname of the AMQP broker. |
| `port` | `5672` | Listening port of the AMQP broker. |
| `user` | `guest` | AMQP broker username. |
| `pass` | `guest` | AMQP broker password. |
| `vhost` | `/` | Virtual host name on the AMQP broker. |
| `exchange` | `exchange` | Name of the exchange. |
| `event-queue` | `event-queue` | Name of the event queue. |
| `event-prefix` | ` ` | Prefix that will be automatically added to published/stripped from received event topics. |
| `auto-create` | `true` | Toggles the providers topology creation feature. Allows to auto-create the required exchanges, queues, and bindings for the provider's need. |

## Initialization

```php

require_once 'vendor/autoload.php';

use \Aztech\Events\Bus\Events;
use \Aztech\Events\Bus\Plugins\Amqp\Amqp;

Amqp::loadPlugin();

// See options chart for actual parameters
$options = array(...);

$publisher = Events::createPublisher('amqp', $options);
$event = Events::create('category', array('property' => 'value'));

$publisher->publish($event);
// ...
```

## Caveats

At the time being, the AMQP event plugin uses topic based routing to publish events. Multiple nodes connecting to a single queue will work in round-robin mode.

It is possible to use different routing scenarios/exchange types, but that is left as an exercise to the reader (Hint: no need to build/patch the current plugin).

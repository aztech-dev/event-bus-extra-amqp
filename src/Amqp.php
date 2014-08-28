<?php

namespace Aztech\Events\Bus\Plugins\Amqp;

use Aztech\Events\Bus\Events;
use Aztech\Events\Bus\GenericPluginFactory;

class Amqp
{
    public static function loadPlugin($name = 'amqp')
    {
        Events::addPlugin($name, new GenericPluginFactory(function () {
            return new AmqpChannelProvider();
        }), new AmqpOptionsDescriptor());
    }
}

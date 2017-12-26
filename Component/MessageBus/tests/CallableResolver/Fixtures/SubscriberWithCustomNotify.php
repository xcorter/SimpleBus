<?php

declare(strict_types=1);

namespace SimpleBus\Message\Tests\CallableResolver\Fixtures;

class SubscriberWithCustomNotify
{
    public function customNotifyMethod($message): void
    {
    }
}

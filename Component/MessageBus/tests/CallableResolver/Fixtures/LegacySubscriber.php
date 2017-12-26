<?php

declare(strict_types=1);

namespace SimpleBus\Message\Tests\CallableResolver\Fixtures;

class LegacySubscriber
{
    public function notify($message): void
    {
    }
}

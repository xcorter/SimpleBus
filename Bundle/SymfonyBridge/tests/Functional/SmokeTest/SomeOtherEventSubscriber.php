<?php

declare(strict_types=1);

namespace SimpleBus\SymfonyBridge\Tests\Functional\SmokeTest;

class SomeOtherEventSubscriber
{
    public $eventHandled = false;

    public function notify(): void
    {
        $this->eventHandled = true;
    }
}

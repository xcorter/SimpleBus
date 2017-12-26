<?php

declare(strict_types=1);

namespace SimpleBus\SymfonyBridge\Tests\Functional\SmokeTest;

use SimpleBus\Message\Bus\MessageBus;

class TestEntityCreatedEventSubscriber
{
    private $commandBus;
    public $eventHandled = false;

    public function __construct(MessageBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function notify(): void
    {
        $this->eventHandled = true;

        $this->commandBus->handle(new SomeOtherTestCommand());
    }
}

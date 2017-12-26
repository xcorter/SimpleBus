<?php

declare(strict_types=1);

namespace SimpleBus\Message\Tests\Fixtures;

class CallableSpy
{
    private $hasBeenCalled = 0;
    private $receivedMessages = [];

    public function __invoke($message): void
    {
        ++$this->hasBeenCalled;
        $this->receivedMessages[] = $message;
    }

    public function hasBeenCalled()
    {
        return $this->hasBeenCalled;
    }

    public function receivedMessages()
    {
        return $this->receivedMessages;
    }
}

<?php

declare(strict_types=1);

namespace SimpleBus\AsynchronousBundle\Tests\Functional;

class EventSubscriberSpy
{
    private $notifiedEvents = [];

    public function notify($message): void
    {
        $this->notifiedEvents[] = $message;
    }

    public function notifiedEvents()
    {
        return $this->notifiedEvents;
    }
}

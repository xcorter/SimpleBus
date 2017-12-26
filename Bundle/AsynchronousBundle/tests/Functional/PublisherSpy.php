<?php

declare(strict_types=1);

namespace SimpleBus\AsynchronousBundle\Tests\Functional;

use SimpleBus\Asynchronous\Publisher\Publisher;

class PublisherSpy implements Publisher
{
    private $publishedMessages = [];

    public function publish($message): void
    {
        $this->publishedMessages[] = $message;
    }

    public function publishedMessages()
    {
        return $this->publishedMessages;
    }
}

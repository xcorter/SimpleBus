<?php

declare(strict_types=1);

namespace SimpleBus\Message\Tests\Recorder\Fixtures;

use SimpleBus\Message\Recorder\ContainsRecordedMessages;

class ContainsRecordedMessagesStub implements ContainsRecordedMessages
{
    private $messages;

    public function __construct(array $messages)
    {
        $this->messages = $messages;
    }

    public function eraseMessages(): void
    {
        $this->messages = [];
    }

    public function recordedMessages()
    {
        return $this->messages;
    }
}

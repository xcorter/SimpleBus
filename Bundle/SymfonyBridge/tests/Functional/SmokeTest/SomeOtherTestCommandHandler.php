<?php

declare(strict_types=1);

namespace SimpleBus\SymfonyBridge\Tests\Functional\SmokeTest;

use SimpleBus\Message\Recorder\RecordsMessages;

class SomeOtherTestCommandHandler
{
    public $commandHandled = false;
    private $messageRecorder;

    public function __construct(RecordsMessages $messageRecorder)
    {
        $this->messageRecorder = $messageRecorder;
    }

    public function handle(): void
    {
        $this->commandHandled = true;

        $this->messageRecorder->record(new SomeOtherEvent());
    }
}

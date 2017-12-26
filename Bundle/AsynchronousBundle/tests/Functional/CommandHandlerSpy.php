<?php

declare(strict_types=1);

namespace SimpleBus\AsynchronousBundle\Tests\Functional;

class CommandHandlerSpy
{
    private $handledCommands = [];

    public function handle($message): void
    {
        $this->handledCommands[] = $message;
    }

    public function handledCommands()
    {
        return $this->handledCommands;
    }
}

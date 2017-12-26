<?php

declare(strict_types=1);

namespace SimpleBus\SymfonyBridge\Tests\Functional\SmokeTest\Auto;

final class AutoCommandHandlerUsingInvoke
{
    public $handled;

    public function __invoke(AutoCommand1 $command): void
    {
        $this->handled = $command;
    }
}

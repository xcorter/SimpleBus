<?php

declare(strict_types=1);

namespace SimpleBus\SymfonyBridge\Tests\Functional\SmokeTest\Auto;

final class AutoCommandHandlerUsingPublicMethod
{
    public $handled;

    public function someHandleMethod(AutoCommand2 $command): void
    {
        $this->handled = $command;
    }
}

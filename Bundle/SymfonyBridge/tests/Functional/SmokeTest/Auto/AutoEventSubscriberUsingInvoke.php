<?php

declare(strict_types=1);

namespace SimpleBus\SymfonyBridge\Tests\Functional\SmokeTest\Auto;

final class AutoEventSubscriberUsingInvoke
{
    public $handled;

    public function __invoke(AutoEvent1 $event): void
    {
        $this->handled = $event;
    }

    public function randomPublicMethod($value): void
    {
    }
}

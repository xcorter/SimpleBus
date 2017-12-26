<?php

declare(strict_types=1);

namespace SimpleBus\RabbitMQBundleBridge\Tests\Functional;

class AlwaysFailingCommandHandler
{
    public function handle(): void
    {
        throw new \Exception('I always fail');
    }
}

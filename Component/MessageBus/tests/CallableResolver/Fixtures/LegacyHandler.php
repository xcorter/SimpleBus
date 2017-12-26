<?php

declare(strict_types=1);

namespace SimpleBus\Message\Tests\CallableResolver\Fixtures;

class LegacyHandler
{
    public function handle($message): void
    {
    }
}

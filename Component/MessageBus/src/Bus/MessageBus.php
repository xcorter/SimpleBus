<?php

declare(strict_types=1);

namespace SimpleBus\Message\Bus;

interface MessageBus
{
    /**
     * @param object $message
     */
    public function handle($message);
}

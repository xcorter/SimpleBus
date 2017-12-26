<?php

declare(strict_types=1);

namespace SimpleBus\Message\Handler\Resolver;

interface MessageHandlerResolver
{
    /**
     * Resolve the message handler callable for the given message.
     *
     * @param object $message
     *
     * @return callable
     */
    public function resolve($message);
}

<?php

declare(strict_types=1);

namespace SimpleBus\Asynchronous\Routing;

class EmptyRoutingKeyResolver implements RoutingKeyResolver
{
    /**
     * Always use an empty routing key.
     *
     * {@inheritdoc}
     */
    public function resolveRoutingKeyFor($message)
    {
        return '';
    }
}

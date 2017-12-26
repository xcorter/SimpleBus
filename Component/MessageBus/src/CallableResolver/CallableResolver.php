<?php

declare(strict_types=1);

namespace SimpleBus\Message\CallableResolver;

use SimpleBus\Message\CallableResolver\Exception\CouldNotResolveCallable;

interface CallableResolver
{
    /**
     * @param $maybeCallable
     *
     * @throws CouldNotResolveCallable
     *
     * @return callable
     */
    public function resolve($maybeCallable);
}

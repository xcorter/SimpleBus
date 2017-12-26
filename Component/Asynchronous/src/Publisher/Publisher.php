<?php

declare(strict_types=1);

namespace SimpleBus\Asynchronous\Publisher;

interface Publisher
{
    /**
     * Publish a message to be handled asynchronously.
     *
     * @param object $message
     */
    public function publish($message);
}

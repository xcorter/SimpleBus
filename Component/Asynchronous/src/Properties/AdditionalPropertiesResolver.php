<?php

declare(strict_types=1);

namespace SimpleBus\Asynchronous\Properties;

interface AdditionalPropertiesResolver
{
    /**
     * Determine additional properties for messages containing a serialized version of this message.
     *
     * @param object $message
     *
     * @return array The array of additional properties or empty array
     */
    public function resolveAdditionalPropertiesFor($message);
}

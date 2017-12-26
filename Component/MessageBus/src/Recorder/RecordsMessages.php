<?php

declare(strict_types=1);

namespace SimpleBus\Message\Recorder;

interface RecordsMessages extends ContainsRecordedMessages
{
    /**
     * Record a message.
     *
     * @param object $message
     */
    public function record($message);
}

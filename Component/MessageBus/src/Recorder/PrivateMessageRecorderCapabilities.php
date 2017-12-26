<?php

declare(strict_types=1);

namespace SimpleBus\Message\Recorder;

/**
 * Use this trait in classes which implement ContainsRecordedMessages to privately record and later release Message
 * instances, like events.
 */
trait PrivateMessageRecorderCapabilities
{
    private $messages = [];

    /**
     * {@inheritdoc}
     */
    public function recordedMessages()
    {
        return $this->messages;
    }

    /**
     * {@inheritdoc}
     */
    public function eraseMessages(): void
    {
        $this->messages = [];
    }

    /**
     * Record a message.
     *
     * @param object $message
     */
    protected function record($message): void
    {
        $this->messages[] = $message;
    }
}

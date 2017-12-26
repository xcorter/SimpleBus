<?php

declare(strict_types=1);

namespace SimpleBus\Serialization\Envelope;

class DefaultEnvelopeFactory implements EnvelopeFactory
{
    public function wrapMessageInEnvelope($message)
    {
        return DefaultEnvelope::forMessage($message);
    }

    public function envelopeClass()
    {
        return 'SimpleBus\Serialization\Envelope\DefaultEnvelope';
    }
}

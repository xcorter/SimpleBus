<?php

declare(strict_types=1);

namespace Message\Envelope;

use PHPUnit\Framework\TestCase;
use SimpleBus\Serialization\Envelope\DefaultEnvelope;
use SimpleBus\Serialization\Tests\Fixtures\DummyMessage;

class DefaultEnvelopeTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates_an_envelope_for_a_message(): void
    {
        $message = new DummyMessage();
        $type = get_class($message);

        $envelope = DefaultEnvelope::forMessage($message);
        $this->assertInstanceOf('SimpleBus\Serialization\Envelope\DefaultEnvelope', $envelope);
        $this->assertSame($message, $envelope->message());
        $this->assertSame($type, $envelope->messageType());
    }

    /**
     * @test
     */
    public function it_creates_a_new_instance_for_a_different_message(): void
    {
        $message = new DummyMessage();
        $type = get_class($message);
        $envelope = DefaultEnvelope::forMessage($message);
        $aDifferentMessage = new DummyMessage();

        $newEnvelope = $envelope->withMessage($aDifferentMessage);

        $this->assertNotSame($envelope, $newEnvelope);
        $this->assertSame($aDifferentMessage, $newEnvelope->message());
        $this->assertSame($type, $newEnvelope->messageType());
    }

    /**
     * @test
     */
    public function it_creates_a_new_instance_for_a_serialized_version_of_the_message(): void
    {
        $message = new DummyMessage();
        $type = get_class($message);
        $envelope = DefaultEnvelope::forMessage($message);
        $serializedMessage = 'the serialized message';

        $newEnvelope = $envelope->withSerializedMessage($serializedMessage);

        $this->assertNotSame($envelope, $newEnvelope);
        $this->assertSame($message, $newEnvelope->message());
        $this->assertSame($serializedMessage, $newEnvelope->serializedMessage());
        $this->assertSame($type, $newEnvelope->messageType());
    }

    /**
     * @test
     */
    public function it_fails_when_the_serialized_message_is_unavailable(): void
    {
        $message = new DummyMessage();
        $envelope = DefaultEnvelope::forMessage($message);

        $this->expectException('LogicException');

        $envelope->serializedMessage();
    }

    /**
     * @test
     */
    public function it_fails_when_the_message_is_unavailable(): void
    {
        $envelope = DefaultEnvelope::forSerializedMessage(
            'SimpleBus\Serialization\Tests\Fixtures\DummyMessage',
            'serialized message'
        );

        $this->expectException('LogicException');

        $envelope->message();
    }
}

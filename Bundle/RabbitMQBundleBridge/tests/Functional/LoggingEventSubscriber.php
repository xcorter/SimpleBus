<?php

declare(strict_types=1);

namespace SimpleBus\RabbitMQBundleBridge\Tests\Functional;

use Psr\Log\LoggerInterface;

class LoggingEventSubscriber
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function notify($message): void
    {
        $this->logger->debug('Notified of message', ['type' => get_class($message)]);
    }
}

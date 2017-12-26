<?php

declare(strict_types=1);

namespace SimpleBus\RabbitMQBundleBridge\Tests\Functional;

use Psr\Log\LoggerInterface;

class LoggingCommandHandler
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function handle($message): void
    {
        $this->logger->debug('Handling message', ['type' => get_class($message)]);
    }
}

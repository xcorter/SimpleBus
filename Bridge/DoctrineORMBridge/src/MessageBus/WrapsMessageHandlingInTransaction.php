<?php

declare(strict_types=1);

namespace SimpleBus\DoctrineORMBridge\MessageBus;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManager;
use Exception;
use SimpleBus\Message\Bus\Middleware\MessageBusMiddleware;

class WrapsMessageHandlingInTransaction implements MessageBusMiddleware
{
    /**
     * @var ManagerRegistry
     */
    private $managerRegistry;

    /**
     * @var string
     */
    private $entityManagerName;

    /**
     * @param ManagerRegistry $managerRegistry
     * @param string          $entityManagerName
     */
    public function __construct(ManagerRegistry $managerRegistry, $entityManagerName)
    {
        $this->managerRegistry = $managerRegistry;
        $this->entityManagerName = $entityManagerName;
    }

    public function handle($message, callable $next): void
    {
        $entityManager = $this->managerRegistry->getManager($this->entityManagerName);
        /* @var $entityManager EntityManager */

        try {
            $entityManager->transactional(
                function () use ($message, $next): void {
                    $next($message);
                }
            );
        } catch (Exception $exception) {
            $this->managerRegistry->resetManager($this->entityManagerName);

            throw $exception;
        }
    }
}

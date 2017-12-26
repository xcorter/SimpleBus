<?php

declare(strict_types=1);

namespace SimpleBus\Message\Bus\Middleware;

use SimpleBus\Message\Bus\MessageBus;

class MessageBusSupportingMiddleware implements MessageBus
{
    /**
     * @var MessageBusMiddleware[]
     */
    private $middlewares = [];

    public function __construct(array $middlewares = [])
    {
        foreach ($middlewares as $middleware) {
            $this->appendMiddleware($middleware);
        }
    }

    /**
     * Appends new middleware for this message bus. Should only be used at configuration time.
     *
     * @private
     *
     * @param MessageBusMiddleware $middleware
     */
    public function appendMiddleware(MessageBusMiddleware $middleware): void
    {
        $this->middlewares[] = $middleware;
    }

    /**
     * Returns a list of middlewares. Should only be used for introspection.
     *
     * @private
     *
     * @return array<MessageBusMiddleware>
     */
    public function getMiddlewares()
    {
        return $this->middlewares;
    }

    /**
     * Prepends new middleware for this message bus. Should only be used at configuration time.
     *
     * @private
     *
     * @param MessageBusMiddleware $middleware
     */
    public function prependMiddleware(MessageBusMiddleware $middleware): void
    {
        array_unshift($this->middlewares, $middleware);
    }

    public function handle($message): void
    {
        call_user_func($this->callableForNextMiddleware(0), $message);
    }

    private function callableForNextMiddleware($index)
    {
        if (!isset($this->middlewares[$index])) {
            return function (): void {
            };
        }

        $middleware = $this->middlewares[$index];

        return function ($message) use ($middleware, $index): void {
            $middleware->handle($message, $this->callableForNextMiddleware($index + 1));
        };
    }
}

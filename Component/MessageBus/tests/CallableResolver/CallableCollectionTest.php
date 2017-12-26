<?php

declare(strict_types=1);

namespace SimpleBus\Message\Tests\CallableResolver;

use PHPUnit\Framework\TestCase;
use SimpleBus\Message\CallableResolver\CallableCollection;
use SimpleBus\Message\CallableResolver\CallableResolver;

class CallableCollectionTest extends TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|CallableResolver
     */
    private $callableResolver;

    protected function setUp(): void
    {
        $this->callableResolver = $this->createMock('SimpleBus\Message\CallableResolver\CallableResolver');
    }

    /**
     * @test
     */
    public function it_returns_an_empty_array_if_no_callables_are_defined(): void
    {
        $collection = new CallableCollection([], $this->callableResolver);
        $this->assertSame([], $collection->filter('undefined_name'));
    }

    /**
     * @test
     */
    public function it_returns_many_resolved_callables_for_a_given_name(): void
    {
        $message1Callable1 = function (): void {
        };
        $message1Callable2 = function (): void {
        };
        $collection = new CallableCollection(
            [
                'message1' => [
                    $message1Callable1,
                    $message1Callable2,
                ],
                'message2' => [
                    function (): void {},
                    function (): void {},
                ],
            ],
            $this->callableResolver
        );

        $this->callableResolverShouldResolve([$message1Callable1, $message1Callable2]);

        $callables = $collection->filter('message1');

        $this->assertSame([$message1Callable1, $message1Callable2], $callables);
    }

    private function callableResolverShouldResolve(array $callables): void
    {
        foreach ($callables as $index => $callable) {
            $this->callableResolver
                ->expects($this->at($index))
                ->method('resolve')
                ->with($this->identicalTo($callable))
                ->will($this->returnValue($callable));
        }
    }
}

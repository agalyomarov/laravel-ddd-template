<?php

namespace App\Infrastructure\Events;

use App\Application\Contracts\EventDispatcherInterface;
use Illuminate\Contracts\Events\Dispatcher as LaravelDispatcher;

class LaravelEventDispatcher implements EventDispatcherInterface
{
    public function __construct(private LaravelDispatcher $dispatcher) {}

    public function dispatch(object $event): void
    {
        $this->dispatcher->dispatch($event);
    }
}

<?php declare(strict_types=1);

namespace Diy\Tools;

use Diy\Domain\Interfaces\EventInterface;

class EventStore
{
    private $eventStream;

    public function __construct()
    {
        $this->eventStream = [];
    }

    public function add(EventInterface $event, array $metaData)
    {
        $this->eventStream[] = [
            'meta' => $metaData,
            'event' => $event,
        ];
    }
}
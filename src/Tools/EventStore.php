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

    public function fetchEventsOfCart($cartId, $metaKey = null, $metaValue = null)
    {
        $returnEvents = [];
        foreach ($this->eventStream as $eventOfStream) {
            if ($cartId != $eventOfStream['event']->getCartId()) {
                continue;
            }

            if (! is_null($metaKey)) {
                if (! array_key_exists($metaKey, $eventOfStream['meta'])) {
                    continue;
                }
                if ($metaValue != $eventOfStream['meta'][$metaKey]) {
                    continue;
                }
            }

            $returnEvents[] = $eventOfStream;
        }

        return $returnEvents;
    }
}
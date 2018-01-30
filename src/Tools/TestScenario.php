<?php declare(strict_types=1);

namespace Diy\Tools;

use Diy\Domain\Interfaces\CommandInterface;
use Diy\Domain\Interfaces\EventInterface;

class TestScenario
{
    private $givenEvents = [];
    private $whenCommands = [];
    private $thenEvent;

    public function given(EventInterface $event)
    {
        $this->givenEvents[] = $event;
        return $this;
    }

    public function when(CommandInterface $command)
    {
        $this->whenCommands[] = $command;
        return $this;
    }

    public function then($event)
    {
        $this->thenEvent = $event;
        return $this;
    }

    public function thenNothing()
    {
        $this->thenEvent = false;
        return $this;
    }

    public function assert()
    {
        throw new \Exception('Not implemented.');
    }

    public function getGivenEvents(): array
    {
        return $this->givenEvents;
    }

    public function getWhenCommands(): array
    {
        return $this->whenCommands;
    }

    /**
     * @return bool|EventInterface
     */
    public function getThenEvent()
    {
        return $this->thenEvent;
    }
}

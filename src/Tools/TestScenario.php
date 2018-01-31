<?php declare(strict_types=1);

namespace Diy\Tools;

use Diy\Domain\Interfaces\CommandInterface;
use Diy\Domain\Interfaces\EventInterface;

class TestScenario
{
    private $givenEvents = [];
    private $whenCommand;
    private $thenEvents = [];

    public function given(EventInterface $event)
    {
        $this->givenEvents[] = $event;
        return $this;
    }

    public function when(CommandInterface $command)
    {
        $this->whenCommand = $command;
        return $this;
    }

    public function then(EventInterface $event)
    {
        $this->thenEvents[] = $event;
        return $this;
    }

    public function thenNothing()
    {
        $this->thenEvents = false;
        return $this;
    }

    public function assert()
    {
        return;
        throw new \Exception('Not implemented.');
    }

    public function getGivenEvents(): array
    {
        return $this->givenEvents;
    }

    public function getWhenCommand()
    {
        return $this->whenCommand;
    }

    public function getThenEvents()
    {
        return $this->thenEvents;
    }
}

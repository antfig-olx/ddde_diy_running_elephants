<?php declare(strict_types=1);

namespace Diy\Tools;

use Diy\Domain\Interfaces\CommandInterface;
use Diy\Domain\Interfaces\EventInterface;

class TestScenario
{
    private $givenEvent;
    private $whenCommand;
    private $thenEvent;

    public function given(EventInterface $event)
    {
        $this->givenEvent[] = $event;
        return $this;
    }

    public function when(CommandInterface $command)
    {
        $this->whenCommand[] = $command;
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
}

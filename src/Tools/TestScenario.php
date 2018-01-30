<?php declare(strict_types=1);

namespace Diy\Tools;

class TestScenario
{
    private $givenEvent;
    private $whenCommand;
    private $thenEvent;

    public function given($event)
    {
        $this->givenEvent = $event;
        return $this;
    }

    public function when($command)
    {
        $this->whenCommand = $command;
        return $this;
    }

    public function then($event)
    {
        $this->thenEvent = $event;
        return $this;
    }

    public function assert()
    {
        throw new \Exception('Not implemented.');
    }
}
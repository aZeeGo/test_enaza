<?php

namespace Entities;

use Entities\Interface\{IBar, ISong, IVisitor};

class Bar implements IBar
{
    private array|IVisitor $visitors;
    private ISong $song;

    public function __construct($visitors)
    {
        $this->visitors = $visitors;

    }

    /**
     * @return array|IVisitor
     */
    public function getVisitors(): IVisitor|array
    {
        return $this->visitors;
    }
    public function setSong(ISong $song)
    {
        $this->song = $song;
    }
    public function visitorListen()
    {
        foreach ($this->visitors as $visitor)
        {
            /** @var IVisitor $visitor */
            $visitor->resetStatus();
            $visitor->listen($this->song);
        }
    }

}
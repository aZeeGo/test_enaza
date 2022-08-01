<?php

use Entities\Bar;
use Presenters\Presenter;
use Repositories\PlaylistRepository;
use Services\VisitorService;

class Enaza
{
    /**
     * @var array|mixed
     */
    private PlaylistRepository $playlist;
    private Presenter $presenter;
    private VisitorService $visitorService;

    public function __construct(PlaylistRepository $playlist, Presenter $presenter, VisitorService $visitorService)
    {
        $this->playlist = $playlist;
        $this->presenter = $presenter;
        $this->visitorService = $visitorService;
    }
    public function run(): void
    {
        $bar = new Bar($this->visitorService->createVisitors());

        foreach ($this->playlist->nextSong() as $song)
        {
            $bar->setSong($song);
            $this->presenter->printSong($song);

            $bar->visitorListen();


            foreach ($bar->getVisitors() as $visitor)
            {
                $this->presenter->printStatusVisitor($visitor);
            }



            sleep($this->playlist->timeout);
        }

    }

}
<?php

namespace Presenters;

use Entities\Interface\ISong;
use Entities\Interface\IVisitor;

class Presenter
{
    public function __construct(
        private IPresenter $presenter
    ){}
    public function printStatusVisitor(IVisitor $visitor)
    {
        $genresString = implode(',', $visitor->getFavoriteGenres());
        return $this->presenter->print(
            "Посетитель  с любимыми жанрами : {$genresString} делает : {$visitor->getStatus()}"
        );
    }
    public function printSong(ISong $song)
    {
        return $this->presenter->print(
            "______ Играет песня : {$song->getName()} ({$song->getGenre()})"
        );
    }

}
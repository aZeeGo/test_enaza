<?php

namespace Entities;

use Entities\Interface\ISong;
use Entities\Interface\IVisitor;

class Visitor implements IVisitor
{
    private array $favorite_genres;
    private mixed $status;
    private int $id;

    public function __construct($id, $genres = [])
    {
        $this->id = $id;
        $this->favorite_genres = $genres;
    }

    /**
     * @return array
     */
    public function getFavoriteGenres(): array
    {
        return $this->favorite_genres;
    }
    public function dancing()
    {
        $this->status = 'dancing';
    }
    public function drink()
    {
        $this->status = 'drinking';
    }
    public function listen(ISong $song)
    {
        if(in_array($song->getGenre(), $this->getFavoriteGenres()))
        {
            $this->dancing();
        } else {
            $this->drink();
        }
    }

    /**
     * @return mixed
     */
    public function getStatus(): mixed
    {
        return $this->status;
    }
    public function resetStatus()
    {
        $this->status = null;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

}
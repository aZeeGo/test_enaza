<?php

namespace Entities;

use Entities\Interface\ISong;

class Song implements ISong
{
    private int $id;
    private string $name;
    private string $genre;

    public function __construct(int $id, string $name, string $genre)
    {
        $this->id = $id;
        $this->name = $name;
        $this->genre = $genre;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getGenre(): string
    {
        return $this->genre;
    }
}
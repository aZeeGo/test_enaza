<?php

namespace Repositories;

use Repositories\Interface\IPlaylist;

class Playlistlocal implements IPlaylist
{
    public array $playlist;

    public function __construct($config)
    {
        $this->playlist = $config['demo_playlist'];
    }

    public function getAll(): array
    {
        return $this->playlist;
    }
}
<?php

namespace Repositories;

use Entities\Song;
use Generator;
use Repositories\Interface\IPlaylist;

class PlaylistRepository
{
    public mixed $timeout;
    private IPlaylist $playlist;

    public function __construct($config, IPlaylist $playlist)
    {
        $this->timeout = $config['timeout_between_song'];
        $this->playlist = $playlist;
    }
    public function nextSong(): Generator
    {
        foreach ($this->playlist->getAll() as $music)
        {
            yield new Song(id: $music['id'], name: $music['name'], genre: $music['genre']);
        }
    }
}
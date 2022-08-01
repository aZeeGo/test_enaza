<?php

namespace Entities\Interface;

interface IVisitor
{
    public function getFavoriteGenres(): array;
    public function dancing();
    public function drink();
    public function listen(ISong $song);
    public function getStatus();
    public function resetStatus();

}
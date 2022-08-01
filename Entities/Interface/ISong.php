<?php

namespace Entities\Interface;

interface ISong
{
    public function getId() : int;
    public function getName() : string;
    public function getGenre() : string;

}
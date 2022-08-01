<?php

namespace Presenters;

class CliPresenter implements IPresenter
{

    public function print($text)
    {
        echo $text, PHP_EOL;
    }
}
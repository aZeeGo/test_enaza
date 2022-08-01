<?php

use Presenters\CliPresenter;
use Presenters\Presenter;
use Repositories\Playlistlocal;
use Repositories\PlaylistRepository;
use Services\VisitorService;

$config = include('config.php');

spl_autoload_register(function ($class){
    require_once __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
});


$app = new Enaza(
    new PlaylistRepository($config, new Playlistlocal($config)),
    new Presenter(new CliPresenter()),
    new VisitorService($config)
);

$app->run();

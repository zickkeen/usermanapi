<?php

declare(strict_types=1);

use Slim\Routing\RouteCollectorProxy;

$app->get('/', 'App\Controller\Home:getHelp');
$app->get('/status', 'App\Controller\Home:getStatus');

$app->group('/user',  function (RouteCollectorProxy $group) {
    $group->get('/lists', 'App\Controller\User:getLists');
    $group->get('/import', 'App\Controller\User:import');
    $group->get('/show', 'App\Controller\User:getUsers');
});

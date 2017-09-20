<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ],
]);

$app->get('/', function (Request $req,  Response $res, $args = []) {
    echo "boilerplate";
});

$app->run();
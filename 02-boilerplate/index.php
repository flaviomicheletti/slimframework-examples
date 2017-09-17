<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$config = [
    'settings' => [
        'displayErrorDetails' => true # change this <------
    ],
];

$app = new \Slim\App($config);

$app->get('/', function (Request $req,  Response $res, $args = []) {
    echo "boilerplate";
});

$app->run();
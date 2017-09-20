<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ],
]);

#
# C - create
#
$app->post('/', function (Request $req,  Response $res, $args = []) {
    echo "post";
});

#
# R - read
#
$app->get('/', function (Request $req,  Response $res, $args = []) {
    echo "get";
});

#
# U - update
#
$app->put('/', function (Request $req,  Response $res, $args = []) {
    echo "put";
});

#
# D - delete
#
$app->delete('/', function (Request $req,  Response $res, $args = []) {
    echo "delete";
});


$app->run();

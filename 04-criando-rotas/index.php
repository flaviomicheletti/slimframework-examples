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
# index
#
$app->get('/', function (Request $req,  Response $res, $args = []) {
    echo "index";
});


#
# /abc
#
$app->get('/abc', function (Request $req,  Response $res, $args = []) {
    echo "abc";
});

#
# abc/
#
$app->get('/abc/', function (Request $req,  Response $res, $args = []) {
    echo "abc/";
});

#
# tanto /foo quanto foo/
#
$app->get('/foo[/]', function (Request $req,  Response $res, $args = []) {
    echo "tanto /foo quanto foo/";
});

# /users,
# /users/,  <--- não corresponde
# /users/1
# /users/2
# /users/3
# etc..
$app->get('/users[/{id}]', function ($request, $response, $args) {
    $id = $request->getAttribute('id');
    if ($id) {
        echo "/users/$id";
    } else {
        echo "/users";
    }
});

# /products     <--- não corresponde
# products/     <--- não corresponde
# products/abc  <--- não corresponde
# products/1
# products/2
# products/3
# etc..
$app->get('/products/{id:[0-9]+}', function ($request, $response, $args) {
    $id = $request->getAttribute('id');
    echo "/products/$id";
});

#
# index com argumento
#
$app->get('/{var}', function (Request $req,  Response $res, $args = []) {
    echo "index - ser argumento é: " . $args['var'];
});


$app->run();
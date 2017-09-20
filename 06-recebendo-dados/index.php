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
# SEND GET /
#
$app->get('/', function (Request $req, Response $res, $args = []) {
});

#
# SEND GET /foo/123
#
$app->get('/foo/{bar}', function (Request $req, Response $res, $args = []) {
    var_dump($args);                            # ['bar' => 123]
    var_dump($req->getAttribute('bar'));        # 123
});

#
# SEND GET /foo/?bar=123
#
$app->get('/foo/', function (Request $req, Response $res, $args = []) {
    var_dump($req->getParam('bar'));            # 123
    var_dump($req->getQueryParams());           # ['bar' => 123]
    var_dump($req->getParams());                # ['bar' => 123] 
});

#
# SEND POST /foo/ (parameters is bar=123)
#
$app->post('/foo/', function (Request $req, Response $res, $args = []) {
    var_dump($req->getParam('bar'));            # 123
    var_dump($req->getParsedBodyParam('bar'));  # 123
    var_dump($req->getParsedBody());            # ['bar' => '123']
});

#
# SEND PUT /foo/ (parameters is bar=123)
#
$app->put('/foo/', function (Request $req, Response $res, $args = []) {
    var_dump($req->getParam('bar'));            # 123
    var_dump($req->getParsedBodyParam('bar'));  # 123
    var_dump($req->getParsedBody());            # ['bar' => '123']
});

#
# SEND DELETE /foo/123
#
$app->delete('/foo/{bar}', function (Request $req, Response $res, $args = []) {
    var_dump($args);                            # ['bar' => 123]
    var_dump($req->getAttribute('bar'));        # 123
});

$app->run();
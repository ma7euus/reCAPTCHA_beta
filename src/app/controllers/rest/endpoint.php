<?php

//namespace app\controllers\rest;

require_once '../../../config.php';

error_log($_REQUEST["p"]);

\app\libs\Slim\Slim::registerAutoloader();
$args = explode("/", $_REQUEST['parameters']);
error_log(print_r($args, true));
$app = new \app\libs\Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');
$app->response();

$app->get('/user', 'getUser');

$app->get('/foo', function () {
    error_log("fooooooooooooooooo");
    echo '{"teste": "TESTE"}';
});

$app->run();

function getUser() {
    
    error_log("get usuario");
    echo '{"teste": "TESTE"}';
}
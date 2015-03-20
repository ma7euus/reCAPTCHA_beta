<?php

//namespace app\controllers\rest;

require_once '../../../config.php';

\app\libs\Slim\Slim::registerAutoloader();

$app = new \app\libs\Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');
$app->response();

$app->get('/user', 'getUser');

$app->get('/foo', function () {
    error_log("fooooooooooooooooo");
    echo '{"teste": "TESTE"}';
});

$app->map('/uploader', function(){
    
    $upload_handler = new app\libs\FileUpload\UploadHandler();
    
})->via('GET', 'POST', 'OPTIONS', 'HEAD', 'PATCH', 'PUT', 'DELETE');

$app->run();

function getUser() {
    
    error_log("get usuario");
    echo '{"teste": "TESTE"}';
}
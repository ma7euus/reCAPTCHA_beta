<?php

//namespace app\controllers\rest;

require_once '../../../config.php';

\app\libs\Slim\Slim::registerAutoloader();

$app = new \app\libs\Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');

$app->get('/email_exist/:email', 'validarEmail');

$app->post('/signup', 'cadastrarUsuario');

$app->get('/foo', function () {
    error_log("fooooooooooooooooo");
    echo '{"teste": "TESTE"}';
});

$app->map('/uploader', function() {

    $options['user_dirs'] = true;
    $upload_handler = new app\libs\FileUpload\UploadHandler($options);
})->via('GET', 'POST', 'OPTIONS', 'HEAD', 'PATCH', 'PUT', 'DELETE');

$app->run();


function validarEmail($_email){
    $_userMgr = new app\Controllers\Usuario\UsuarioMgr();
    $retorno = array();
    $retorno['status'] = $_userMgr->ValidarEmailUsuario($_email);
    echo json_encode($retorno);
}

function cadastrarUsuario() {

    $dados = $app->request()->getBody();
    $_userMgr = new app\Controllers\Usuario\UsuarioMgr();

    $_userMgr->CadastrarUsuario(json_decode($dados));
}

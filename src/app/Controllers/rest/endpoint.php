<?php

//namespace app\controllers\rest;

require_once '../../../config.php';

\app\libs\Slim\Slim::registerAutoloader();

$seila = new app\Controllers\Usuario\UsuarioAuth();

$app = new \app\libs\Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');

$app->get('/email_exist/:email', 'validarEmail');

$app->post('/signup', 'cadastrarUsuario');

$app->post('/signin', 'autenticarUsuario');

$app->get('/foo', function () {
    error_log("fooooooooooooooooo");
    echo '{"teste": "TESTE"}';
});

$app->map('/uploader', function() {

    $options['user_dirs'] = true;
    $upload_handler = new app\libs\FileUpload\UploadHandler($options);
})->via('GET', 'POST', 'OPTIONS', 'HEAD', 'PATCH', 'PUT', 'DELETE');

$app->run();

function validarEmail($_email) {
    $_userMgr = new app\Controllers\Usuario\UsuarioMgr();
    $retorno = array();
    $retorno['status'] = $_userMgr->ValidarEmailUsuario($_email);
    echo json_encode($retorno);
}

function cadastrarUsuario() {
    $app = new \app\libs\Slim\Slim();
    $dados = $app->request()->getBody();
    $_userMgr = new app\Controllers\Usuario\UsuarioMgr();
    $retorno = $_userMgr->CadastrarUsuario(json_decode($dados));
    if($retorno->status){
        create_var_session($retorno);
        echo '{"function_exe":"", "auth": "true"}';
    }else{
        echo '{"function_exe":"", "auth": "false"}';
    }
}

function autenticarUsuario() {
    $app = new \app\libs\Slim\Slim();
    $dados = $app->request()->getBody();
    $_userMgr = new app\Controllers\Usuario\UsuarioMgr();
    $retorno = $_userMgr->CadastrarUsuario(json_decode($dados));
    if($retorno->status){
        create_var_session($retorno);
        echo '{"function_exe":"", "auth": "true"}';
    }else{
        echo '{"function_exe":"", "auth": "false"}';
    }
}


function create_var_session(app\Controllers\Usuario\Results\UsuarioResult $_s){
    $_SESSION['ApiKeyAuthSession'] = $_s->apiKey;
    $_SESSION['is_logged'] = true;
    $_SESSION['session_id'] = session_id();
    $_SESSION['idUser'] = $_s->idUser;
    $_SESSION['dirUser'] = $_s->dirUser;
}
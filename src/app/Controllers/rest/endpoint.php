<?php

require_once '../../../config.php';

\app\libs\Slim\Slim::registerAutoloader();

$logado = isset($_SESSION['is_logged']) ? $_SESSION['is_logged'] : false;

if ($logado) {
    \app\Controllers\Usuario\UsuarioAuth::$_apiKey = $_SESSION['ApiKeyAuthSession'];
    \app\Controllers\Usuario\UsuarioAuth::$_userID = $_SESSION['idUser'];
    \app\Controllers\Usuario\UsuarioAuth::$_userPath = $_SESSION['dirUser'];
} else {
    \app\Controllers\Usuario\UsuarioAuth::$_apiKey = NULL;
    \app\Controllers\Usuario\UsuarioAuth::$_userID = NULL;
    \app\Controllers\Usuario\UsuarioAuth::$_userPath = NULL;
}

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
    $logado = isset($_SESSION['is_logged']) ? $_SESSION['is_logged'] : false;
    if ($logado) {
        $options['user_dirs'] = true;
        $upload_handler = new app\libs\FileUpload\UploadHandler($options);
    }
})->via('GET', 'POST', 'OPTIONS', 'HEAD', 'PATCH', 'PUT', 'DELETE');

$app->post('/ocr_exe', 'digitalizarArquivos');

$app->get('/get_catpcha', 'getCAPTCHA');
$app->post('/validate_catpcha', 'validarCAPTCHA');

$app->get('/close_session', function () {
    $r = session_destroy();
    if ($r) {
        \app\Controllers\Usuario\UsuarioAuth::$_apiKey = NULL;
        \app\Controllers\Usuario\UsuarioAuth::$_userID = NULL;
        \app\Controllers\Usuario\UsuarioAuth::$_userPath = NULL;
        $retorno = array();
        $retorno['status'] = true;
    } else {
        $retorno = array();
        $retorno['status'] = false;
    }
    echo json_encode($retorno);
});
//$app->post('/download_txt', 'gerarArquivoTXT');

$app->post('/download_txt', function () use ($app) {

    $dados = $app->request()->getBody();

    $arqMgr = new \app\Controllers\Arquivos\ArquivosMgr();
    $_arq = $arqMgr->ObterDadosArquivo(json_decode($dados));
    $processador = new app\Controllers\Processadores\ArquivoProcessador();
    $dados = $processador->MontarTextoArquivo($_arq);
    $dados->nomeImagem .= '.txt';

    if (strlen($dados->textoProcessado) > 0) {
        $localizacao = $arqMgr->GetPathBase();
        if (\app\Utils\Functions::CreateFolder($localizacao, 'text')) {
            $dir = "{$localizacao}text/";
            $fp = fopen("{$dir}{$dados->nomeImagem}", "w+");
            fwrite($fp, $dados->textoProcessado);
            fclose($fp);
            $url = HTTP_DIR . "/user_files/" . \app\Controllers\Usuario\UsuarioAuth::$_userPath . "/text/";
            echo "{\"status\":\"true\", \"msg\": \"\", \"link\": \"{$url}{$dados->nomeImagem}\"}";
        }
    } else {
        echo '{"status":"false", "msg": ""}';
    }
});

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
    if ($retorno->status) {
        create_var_session($retorno);
        echo '{"function_exe":"", "auth": true}';
    } else {
        echo '{"function_exe":"", "auth": false}';
    }
}

function autenticarUsuario() {
    $app = new \app\libs\Slim\Slim();
    $dados = $app->request()->getBody();
    $_userMgr = new app\Controllers\Usuario\UsuarioMgr();
    $retorno = $_userMgr->AutenticarUsuario(json_decode($dados));
    if ($retorno->status) {
        create_var_session($retorno);
        echo '{"function_exe":"", "auth": true}';
    } else {
        echo '{"function_exe":"", "auth": false}';
    }
}

function digitalizarArquivos() {
    $app = new \app\libs\Slim\Slim();
    $dados = $app->request()->getBody();
    $arqMgr = new \app\Controllers\Arquivos\ArquivosMgr();
    //$dados = '[{"nome":"10435540_324473857716680_4762892084221297786_n.jpg"},{"nome":"10995924_758072374289551_5849189307126465462_n.jpg"},{"nome":"11065483_789233101167699_5154074558589806801_n.jpg"}]';
    $result = $arqMgr->ObterInfoArquivosParaDigitalizacao(json_decode($dados));
    $ocr = new app\Controllers\OCR\OCRMgr();
    $ocrResults = $ocr->ProcessarArquivos($result);
    $result = $arqMgr->ProcessarArquivosGerados($ocrResults);
    $classificador = new \app\Controllers\Processadores\Classificador();
    $result = $classificador->ClassificarArquivos($result);
    if ($arqMgr->GravarArquivosProcessados($result)) {
        echo json_encode(array('status' => true, 'dados' => $result));
    } else {
        echo '{"status":false}';
    }
}

function getCAPTCHA() {
    $gerar = new app\Controllers\CAPTCHA\CAPTCHAManager();
    $captchas = $gerar->GerarCAPTCHA();
    echo json_encode($captchas);
}

function validarCAPTCHA() {
    $app = new \app\libs\Slim\Slim();
    $dados = $app->request()->getBody();

    $validar = new app\Controllers\CAPTCHA\CAPTCHAManager();
    $retorno = $validar->ValidarCAPTCHA(json_decode($dados));
    echo json_encode($retorno);
}

function gerarArquivoTXT() {
    $app = new \app\libs\Slim\Slim();
    $dados = $app->request()->getBody();
    $arqMgr = new \app\Controllers\Arquivos\ArquivosMgr();

    $_arq = $arqMgr->ObterDadosArquivo(json_decode($dados));
    $processador = new app\Controllers\Processadores\ArquivoProcessador();
    $dados = $processador->MontarTextoArquivo($_arq);
    $dados->nomeImagem .= '.txt';
    $app->response()->header('Expires: 0');
    $app->response()->header('Cache-Control: must-revalidate, pre-check=0, post-check=0');
    $app->response()->header('Cache-Control: public');
    $app->response()->header('Content-Description: File Transfer');
    $app->response()->header('Content-Type', 'application/text;charset=utf-8');
    $app->response()->header("Content-Disposition: attachment; filename='{$dados->nomeImagem}'");
    $app->response()->body($dados->textoProcessado);

    //echo $dados->textoProcessado;
}

function create_var_session(app\Controllers\Usuario\Results\UsuarioResult $_s) {
    $_SESSION['ApiKeyAuthSession'] = $_s->apiKey;
    $_SESSION['is_logged'] = true;
    $_SESSION['session_id'] = session_id();
    $_SESSION['idUser'] = $_s->idUser;
    $_SESSION['dirUser'] = $_s->dirUser;
}

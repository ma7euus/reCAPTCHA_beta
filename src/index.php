<?php

include_once './config.php';

$logado = isset($_SESSION['is_logged']) ? $_SESSION['is_logged'] : false;

if($logado){
    include_once APP_HTML_DIR . "app.php";
}else{
    include_once APP_HTML_DIR . "login.php";
}
<?php

define("APP_HTML_DIR", dirname(__FILE__) . "/html/");
define("APP_SERVER_DIR", dirname(__FILE__) . "/");

define("SERVER_DIR", $_SERVER['HTTP_HOST'] . '/reCAPTCHA_beta/src');
define("HTTP_DIR", 'http://' . SERVER_DIR);
define("HTTP_HTML_DIR", 'http://' . SERVER_DIR . '/html/');

date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_ALL, "en_US");

ini_set('session.hash_function', '1');
session_start();

require_once APP_SERVER_DIR . 'app/libs/debug/firephp/fb.php';

define('USER_FILES', '/var/www/html/reCAPTCHA_beta/user_files');
define('TESSERACT_TMP_FILES', '/tmp');

require_once APP_SERVER_DIR . 'app/Utils/Autoloader.php';

$autoLoader = new app\Utils\Autoloader();

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php


error_reporting(E_ALL ^ E_NOTICE);
include_once './app/libs/php/firephp/FirePHP.class.php';
include_once './app/libs/php/firephp/fb.php';
ob_start();

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            fb('teste');
        ?>
    </body>
</html>

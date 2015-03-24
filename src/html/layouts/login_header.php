<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Force latest IE rendering engine or ChromeFrame if installed -->
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
        <meta charset="utf-8">
        <title>Digitalizador de Arquivos de Imagens</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<script src="<?= HTTP_HTML_DIR ?>js/libs/jquery.min.js"></script>-->
        <!-- Bootstrap styles -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.js"></script>
        <script type="text/javascript">

            $(document).ready(function () {
                $.get("api/email_exist/mateus@gmail.com", function (data) {
                    //$(".result" ).html(data);
                    //alert("Load was performed.");
                });
            });

        </script>

    </head>
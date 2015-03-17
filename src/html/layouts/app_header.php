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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <!-- Bootstrap styles -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <!-- Generic page styles -->
        <link rel="stylesheet" href="<?=HTTP_HTML_DIR?>css/libs/file_upload/style.css">
        <!-- blueimp Gallery styles -->
        <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
        <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
        <link rel="stylesheet" href="<?=HTTP_HTML_DIR?>css/libs/file_upload/jquery.fileupload.css">
        <link rel="stylesheet" href="<?=HTTP_HTML_DIR?>css/libs/file_upload/jquery.fileupload-ui.css">
        <!-- CSS adjustments for browsers with JavaScript disabled -->
        <noscript><link rel="stylesheet" href="<?=HTTP_HTML_DIR?>css/libs/file_upload/jquery.fileupload-noscript.css"></noscript>
        <noscript><link rel="stylesheet" href="<?=HTTP_HTML_DIR?>css/libs/file_upload/jquery.fileupload-ui-noscript.css"></noscript>
        
        <script type="text/javascript">
            
            $(document).ready(function (){
                   $.get("http://localhost/reCAPTCHA_beta/src/api/foo", function(data) {
                    $(".result" ).html(data);
                    alert("Load was performed.");
                });
            });
            
        </script>
        
    </head>
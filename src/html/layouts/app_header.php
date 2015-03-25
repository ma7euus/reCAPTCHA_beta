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
        <!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">-->
        <!-- Generic page styles -->
        <link rel="stylesheet" href="<?= HTTP_HTML_DIR ?>css/libs/file_upload/style.css">
        <!-- blueimp Gallery styles -->
        <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
        <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
        <link rel="stylesheet" href="<?= HTTP_HTML_DIR ?>css/libs/file_upload/jquery.fileupload.css">
        <link rel="stylesheet" href="<?= HTTP_HTML_DIR ?>css/libs/file_upload/jquery.fileupload-ui.css">
        <!-- CSS adjustments for browsers with JavaScript disabled -->
        <noscript><link rel="stylesheet" href="<?= HTTP_HTML_DIR ?>css/libs/file_upload/jquery.fileupload-noscript.css"></noscript>
        <noscript><link rel="stylesheet" href="<?= HTTP_HTML_DIR ?>css/libs/file_upload/jquery.fileupload-ui-noscript.css"></noscript>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
        <script src="<?= HTTP_HTML_DIR ?>js/libs/file_upload/vendor/jquery.ui.widget.js"></script>
        <!-- The Templates plugin is included to render the upload/download listings -->
        <script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
        <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
        <script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
        <!-- The Canvas to Blob plugin is included for image resizing functionality -->
        <script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
        <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
        <!--<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
        <!-- blueimp Gallery script -->
        <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
        <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
        <script src="<?= HTTP_HTML_DIR ?>js/libs/file_upload/jquery.iframe-transport.js"></script>
        <!-- The basic File Upload plugin -->
        <script src="<?= HTTP_HTML_DIR ?>js/libs/file_upload/jquery.fileupload.js"></script>
        <!-- The File Upload processing plugin -->
        <script src="<?= HTTP_HTML_DIR ?>js/libs/file_upload/jquery.fileupload-process.js"></script>
        <!-- The File Upload image preview & resize plugin -->
        <script src="<?= HTTP_HTML_DIR ?>js/libs/file_upload/jquery.fileupload-image.js"></script>
        <!-- The File Upload audio preview plugin -->
        <!--<script src="<?= HTTP_HTML_DIR ?>js/libs/file_upload/jquery.fileupload-audio.js"></script>-->
        <!-- The File Upload video preview plugin -->
        <!--<script src="<?= HTTP_HTML_DIR ?>js/libs/file_upload/jquery.fileupload-video.js"></script>-->
        <!-- The File Upload validation plugin -->
        <script src="<?= HTTP_HTML_DIR ?>js/libs/file_upload/jquery.fileupload-validate.js"></script>
        <!-- The File Upload user interface plugin -->
        <script src="<?= HTTP_HTML_DIR ?>js/libs/file_upload/jquery.fileupload-ui.js"></script>
        <!-- The main application script -->
        <script src="<?= HTTP_HTML_DIR ?>js/libs/file_upload/main.js"></script>
        <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
        <!--[if (gte IE 8)&(lt IE 10)]>
        <script src="js/cors/jquery.xdr-transport.js"></script>
        <![endif]-->
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        
        <script type="text/javascript">

                        $(document).ready(function (){
             $.get("api/email_exist/mateus@gmail.com", function(data) {
             //$(".result" ).html(data);
             //alert("Load was performed.");
             });
             });
             
        </script>

    </head>
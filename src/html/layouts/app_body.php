<body style="background-color: #efefef">
  <div class="container">
    <div style="float: right;">
        <button type="submit" class="btn btn-default log-out">
                    <i class="glyphicon glyphicon-log-out"></i>
                    <span>Sair</span>
                </button>
    </div>
    <h1>OCR WEB</h1>
    <h2 class="lead">Gereciamento de arquivos</h2>
    <br>
    <!-- The file upload form used as target for the file upload widget -->
    <form id="fileupload" action="//jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">
        <!-- Redirect browsers with JavaScript disabled to the origin page -->
        <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="row fileupload-buttonbar">
            <div class="col-lg-9">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add Imagens...</span>
                    <input type="file" name="files[]" multiple>
                </span>
                <button type="submit" class="btn btn-info start">
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Iniciar upload</span>
                </button>
                <button type="reset" class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancelar upload</span>
                </button>
               <!-- <button type="submit" class="btn btn-primary start-dig">
                    <i class="glyphicon glyphicon-cog"></i>
                    <span>Iniciar Digitalização</span>
                </button> -->
                <button type="button" class="btn btn-danger delete">
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Deletar</span>
                </button>
                <input type="checkbox" class="toggle">
                <!-- The global file processing state -->
                <span class="fileupload-process"></span>
            </div>
            <!-- The global progress state -->
            <div class="col-lg-5 fileupload-progress fade">
                <!-- The global progress bar -->
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                </div>
                <!-- The extended global progress state -->
                <div class="progress-extended">&nbsp;</div>
            </div>
        </div>
        <!-- The table listing the files available for upload/download -->
        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
    </form>
    <br>
</div>
<!-- The blueimp Gallery widget -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-info start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Importar</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancelar</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                    </br>
                    <div class='labels' style='margin-top: 30px; display: {%=file.ArquivoDigitalizado.id != null ?"block":"none"%}'>
                        <span id="total_{%=file.tmpId%}" class='label label-primary'>Total Palavras: {%=file.ArquivoDigitalizado.numTotalPalavras%}</span>
                        <span id="corretas_{%=file.tmpId%}" class='label label-success'>Palavras Reconhecidas: {%=file.ArquivoDigitalizado.numPalavrasCorretas%}</span>
                    </div>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-primary start-dig ocr_file" style='display: {%=file.ArquivoDigitalizado.id != null ?"none":""%}' data-type="POST" id="{%=file.tmpId%}" name="{%=file.name%}">
                        <i class="glyphicon glyphicon-cog"></i>
                    <span>Digitalizar</span>
                </button>
                <button style='display: {%=file.ArquivoDigitalizado.id != null ?"":"none"%}' class="btn btn-default download-dig-file ocr_file" data-type="POST" id="download_{%=file.tmpId%}" name="download_{%=file.name%}">
                        <i class="glyphicon glyphicon-download-alt"></i>
                    <span>Baixar TXT</span>
                </button>
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Deletar</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancelar</span>
                </button>
            {% } %}
        </td>
        <td class="loader">
           <div style="display:none;" class="ajax-loader"><img src="<?=HTTP_HTML_DIR?>img/ajax_loader.gif"></div>
        </td>
    </tr>
{% } %}
</script>
</body>
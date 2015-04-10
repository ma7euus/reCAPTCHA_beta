$(document).ready(function () {

    $(".start-dig").click(function () {
        console.log($(this));
    });

});


function _sendToOCRProcess(e) {

    var array_arquivos = [];
    var arquivo = {};

    arquivo.nome = $(e.target).attr("name");
    arquivo.tmpId = $(e.target).attr("id");

    array_arquivos.push(arquivo);

    $(".btn").attr("disabled", true);
    var loader = $(e.target).parent().parent().children('td.loader').children('div.ajax-loader');
    $(loader).show();
    $.post("api/ocr_exe", JSON.stringify(array_arquivos)).always(function () {
        //alert("ALWAYS");
    }).done(function (result) {
        $(loader).hide();
        $(".btn").removeAttr("disabled");
        if (result.status) {
            var dados = result.dados;
            $.each(dados, function (key, value) {
                var dadosArq = value.dadosArquivoDigitalizado;
                $('#total_' + dadosArq._tmpId).html('Total de Palavras: ' + dadosArq.numTotalPalavras);
                $('#corretas_' + dadosArq._tmpId).html('Palavras Reconhecidas: ' + dadosArq.numPalavrasCorretas);
                $('#total_' + dadosArq._tmpId).parent().show();
                $("#"+dadosArq._tmpId).attr("disabled", true);
                $("#"+dadosArq._tmpId).unbind('click');
            });
        }
    });

}
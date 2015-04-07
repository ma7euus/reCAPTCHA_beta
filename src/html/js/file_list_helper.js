$(document).ready(function () {

    $(".start-dig").click(function () {
        console.log($(this));
    });

});


function _sendToOCRProcess(e) {

    var array_arquivos = [];
    var arquivo = {};

    arquivo.nome = $(e.target).attr("id");

    array_arquivos.push(arquivo);

    $.post("api/ocr_exe", JSON.stringify(array_arquivos)).always(function () {
        //alert("ALWAYS");
    }).done(function (result) {
        $("#sign_ajax_loader").hide();

    });

}
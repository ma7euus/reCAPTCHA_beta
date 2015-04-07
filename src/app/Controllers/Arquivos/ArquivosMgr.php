<?php

namespace app\Controllers\Arquivos;

final class ArquivosMgr {

    protected $_pathBase;

    public function __construct() {
        $this->_pathBase = APP_SERVER_DIR . "user_files/" . \app\Controllers\Usuario\UsuarioAuth::$_userPath . "/";
    }

    /**
     * 
     * @param \stdClass[] $_args
     * @return \app\Controllers\Arquivos\Arguments\ArquivoArgs[]
     */
    public function ObterInfoArquivosParaDigitalizacao(array $_args) {
        $arquivos = array();

        foreach ($_args as $arq) {
            $path_file_name = $this->_pathBase . $arq->nome;
            if (file_exists($path_file_name)) {
                preg_match("/(gif|bmp|png|jpg|jpeg|tiff|raw){1}$/i", $arq->nome, $ext);
                $arquivo = new Arguments\ArquivoArgs($arq->nome, filetype($path_file_name), $ext[0], $this->_pathBase, filesize($path_file_name));
                array_push($arquivos, $arquivo);
            }
        }
        return $arquivos;
    }

    /**
     * 
     * @param \app\Controllers\OCR\Results\OCRProcessamentoResult[] $_ocrResults
     * @return Results\ArquivoImpResult[] Description
     */
    public function ProcessarArquivosGerados(array $_ocrResults) {
        $arquivosResults = array();
        foreach ($_ocrResults as $ocrResult_value) {
            $arquivoResult = new Results\ArquivoImpResult();
            $txt = new Imp\ImportarDadosTXT();
            $arquivoResult->textoReferencia = $txt->Importar(new Arguments\ArquivoArgs("text_ref", "text", "txt", $ocrResult_value->path));

            foreach (glob("{$ocrResult_value->path}*.xml") as $file_value) {
                $xml = new Imp\ImportarDadosXML();
                $arquivoResult->AddDadosXML($xml->Importar(new Arguments\ArquivoArgs($file_value, 'text', 'xml', $ocrResult_value->path)));
            }
            array_push($arquivosResults, $arquivoResult);
        }

        return $arquivosResults;
    }

}

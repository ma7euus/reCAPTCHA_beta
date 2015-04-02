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
            }
        }

        array_push($arquivos, $arquivo);
        return $arquivos;
    }

    public function ImportarArquivosGerados() {
        
    }

}

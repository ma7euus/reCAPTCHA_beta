<?php

namespace app\Controllers\Processadores;

final class ArquivoProcessador {

    /**
     * 
     * @param \app\Models\EntityModels\ArquivosDigitalizadosModel $_arquivo
     * @return \app\Models\EntityModels\ArquivosDigitalizadosModel
     */
    public function MontarTextoArquivo(\app\Models\EntityModels\ArquivosDigitalizadosModel $_arquivo) {
        preg_match("/(gif|bmp|png|jpg|jpeg|tiff|raw){1}$/i", $_arquivo->nomeImagem, $ext);
        $_arquivo->nomeImagem = str_replace('.'.$ext[0], '', $_arquivo->nomeImagem);
        $_arquivo->textoProcessado = $_arquivo->txtReferenciaPalavras;
        foreach ($_arquivo->_Palavras as $palavra) {
            $_arquivo->textoProcessado = str_replace($palavra->numTextoReferencia, $palavra->texto, $_arquivo->textoProcessado);
        }

        return $_arquivo;
    }

}

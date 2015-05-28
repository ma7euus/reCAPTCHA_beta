<?php

namespace app\Controllers\Arquivos\Imp;

use \app\Controllers\Arquivos\Arguments\ArquivoArgs;

final class ImportarPalavraIMG implements IImportarDados {

    /**
     * 
     * @param ArquivoArgs $_args
     * @return \app\Controllers\Arquivos\Results\ArquivoImpPalavraIMGResult Description
     */
    public function Importar(ArquivoArgs $_args) {
        $arquivo = new \app\Controllers\Arquivos\Results\ArquivoImpPalavraIMGResult();

        $arquivo->dados = null;
        if(file_exists("{$_args->localizacao}{$_args->nome}.{$_args->extencao}")){
            $arquivo->dados = file_get_contents("{$_args->localizacao}{$_args->nome}.{$_args->extencao}");   
        }

        return $arquivo;
    }

}

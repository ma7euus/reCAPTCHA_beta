<?php

namespace app\Controllers\Arquivos\Imp;

use \app\Controllers\Arquivos\Arguments\ArquivoArgs;

final class ImportarDadosTXT implements IImportarDados {

    /**
     * 
     * @param ArquivoArgs $_args
     * @return \app\Controllers\Arquivos\Results\ArquivoImpTXTResult Description
     */
    public function Importar(ArquivoArgs $_args) {
        $arquivo = new \app\Controllers\Arquivos\Results\ArquivoImpTXTResult();

        $arquivo->conteudo = file_get_contents("{$_args->localizacao}{$_args->nome}.{$_args->extencao}");

        return $arquivo;
    }

}

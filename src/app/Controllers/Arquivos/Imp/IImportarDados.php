<?php

namespace app\Controllers\Arquivos\Imp;

use \app\Controllers\Arquivos\Arguments\ArquivoArgs;
use \app\Controllers\Arquivos\Results\ArquivoImpResult;

interface IImportarDados {

    /**
     * 
     * @param ArquivoArgs $_args
     * @return ArquivoImpResult Description
     */
    public function Importar(ArquivoArgs $_args);
}

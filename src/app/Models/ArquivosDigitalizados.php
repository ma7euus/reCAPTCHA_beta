<?php

namespace app\Models;

final class ArquivosDigitalizados {
    
    /**
     * 
     * @param \app\Models\EntityModels\ArquivosDigitalizadosModel $_arquivo
     * @return type
     */
    public function GravarArquivoDigitalizado(EntityModels\ArquivosDigitalizadosModel $_arquivo) {

        $Db = new \app\Utils\DB\DBManager();
        return $Db->Gravar(0, 'arquivos_digitalizados', $_arquivo);
    }
}

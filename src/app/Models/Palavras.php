<?php

namespace app\Models;

final class Palavras {

    /**
     * 
     * @param \app\Models\EntityModels\PalavrasModel $_palavra
     * @return type
     */
    public function GravarPalavras(EntityModels\PalavrasModel $_palavra) {

        $Db = new \app\Utils\DB\DBManager();
        return $Db->Gravar(0, 'palavras', $_palavra);
    }

}

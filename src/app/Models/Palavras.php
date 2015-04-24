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

    public function ObterPalavraCAPTCHA() {

        $qry = "SELECT * FROM `palavras` WHERE `reconhecida`= 1 AND texto REGEXP '[A-Za-z]{3,20}' ORDER BY RAND() LIMIT 1,1 ";
    }

    public function ObterPalavraParaReconhecimento() {
        
    }

    public function ValidarPalavraCAPTCHA($_id, $_texto) {
        
    }

}

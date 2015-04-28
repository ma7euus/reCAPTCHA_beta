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

    /**
     * 
     * @return \app\Models\EntityModels\PalavrasModel
     */
    public function ObterPalavraCAPTCHA() {
        $palavra = new EntityModels\PalavrasModel();

        $qry = "SELECT * FROM palavras WHERE reconhecida = 1 AND texto REGEXP '[A-Za-z]{3,25}' ORDER BY RAND() LIMIT 1 ";
        $result = \app\Utils\DB\MySQL\MySQL::Instance()->Select($qry);
        if ($result->isSuccess()) {
            $r = $result->getResult();
            $palavra->SetValues($r[0]);
            return $palavra;
        }

        return $palavra;
    }

    /**
     * 
     * @return \app\Models\EntityModels\PalavrasModel
     */
    public function ObterPalavraParaReconhecimento() {
        $palavra = new EntityModels\PalavrasModel();

        $qry = "SELECT * FROM palavras "
                . " WHERE reconhecida = 0 AND texto REGEXP '[A-Za-z]{3,25}' "
                . " ORDER BY numTentativas_reCAPTCHA DESC LIMIT 1 ";

        $result = \app\Utils\DB\MySQL\MySQL::Instance()->Select($qry);
        if ($result->isSuccess()) {
            $r = $result->getResult();
            if (count($r) > 0) {
                $palavra->SetValues($r[0]);
                return $palavra;
            } else {
                return $this->ObterPalavraCAPTCHA();
            }
        }
        return $palavra;
    }

    /**
     * 
     * @param type $_id
     * @return EntityModels\PalavrasModel
     */
    public function ObterPalavraPorId($_id) {
        $palavra = new EntityModels\PalavrasModel();

        $qry = "SELECT * FROM palavras WHERE id = {$_id}";
        $result = \app\Utils\DB\MySQL\MySQL::Instance()->Select($qry);
        if ($result->isSuccess()) {
            $r = $result->getResult();
            $palavra->SetValues($r[0]);
            return $palavra;
        }

        return $palavra;
    }

    /**
     * 
     * @param \app\Models\EntityModels\PalavrasModel $_palavra
     */
    public function AtualizarTentativasReCaptcha(EntityModels\PalavrasModel $_palavra){
        $Db = new \app\Utils\DB\DBManager();
        return $Db->Gravar($_palavra->id, 'palavras', $_palavra);
    }
    
}

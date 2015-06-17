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

        $qry = "SELECT * FROM palavras WHERE reconhecida = 1 AND texto REGEXP '[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ0-9]{3,25}' ORDER BY RAND() LIMIT 1 ";
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

        $qry = "SELECT p.* FROM palavras p "
                . "JOIN arquivos_digitalizados a ON p.idArquivo = a.id " 
                . " WHERE p.reconhecida = 0 AND p.texto REGEXP '[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ?!0-9]{1,25}' "
                . " ORDER BY a.id ASC, p.taxaAcertoOCR ASC, p.numTentativas_reCAPTCHA DESC LIMIT 1 ";
        //fb($qry);
        $result = \app\Utils\DB\MySQL\MySQL::Instance()->Select($qry);
        if ($result->isSuccess()) {
            $r = $result->getResult();
            if (count($r) > 0) {
                $palavra->SetValues($r[0]);
                return $palavra;
            } else {
                //fb('documento digitalizado!');
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
    public function AtualizarTentativasReCaptcha(EntityModels\PalavrasModel $_palavra) {
        \app\Utils\DB\MySQL\MySQL::Instance()->connection->set_charset('utf8');
        $Db = new \app\Utils\DB\DBManager();
        return $Db->Gravar($_palavra->id, 'palavras', $_palavra);
    }

    /**
     * 
     * @param type $_idArquivo
     * @return \app\Models\EntityModels\PalavrasModel[]
     */
    public function ObterPalavrasPorIdArquivo($_idArquivo) {
        $palavras = array();
        $palavra = new EntityModels\PalavrasModel();

        $qry = "SELECT p.* FROM palavras p"
                . " LEFT JOIN arquivos_digitalizados ad ON p.idArquivo = ad.id "
                . "WHERE p.idArquivo = {$_idArquivo}";

        $resultado = \app\Utils\DB\MySQL\MySQL::Instance()->Select($qry);
        if ($resultado->isSuccess()) {
            $ps = $resultado->getResult();
            foreach ($ps as $p) {
                $palavra = new EntityModels\PalavrasModel();
                $palavra->SetValues($p);
                array_push($palavras, $palavra);
            }
        }

        return $palavras;
    }

}

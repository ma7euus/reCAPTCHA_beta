<?php

namespace app\Models;

final class TentativasReCAPTCHA {

    /**
     * 
     * @param \app\Models\EntityModels\TentativasReCAPTCHAModel $_tentativa
     * @return type
     */
    public function GravarTentativa(EntityModels\TentativasReCAPTCHAModel $_tentativa) {
        \app\Utils\DB\MySQL\MySQL::Instance()->connection->set_charset('utf8');
        $Db = new \app\Utils\DB\DBManager();
        return $Db->Gravar(0, 'tentativas_recaptcha', $_tentativa);
    }

    /**
     * 
     * @param type $_idPalavra
     * @return string
     */
    public function ObterTextoMaiorRecorencia($_idPalavra) {
        $retorno = '';

        $qry = "SELECT tr.textoDigitado, count(id) as tentativas "
                . "FROM `tentativas_recaptcha` as tr "
                . "WHERE idPalavra = {$_idPalavra} GROUP BY textoDigitado "
                . "ORDER BY tentativas DESC LIMIT 1 ";

        $result = \app\Utils\DB\MySQL\MySQL::Instance()->Select($qry);
        if ($result->isSuccess()) {
            $r = $result->getResult();
            return $r[0]['textoDigitado'];
        }
        return $retorno;
    }

}

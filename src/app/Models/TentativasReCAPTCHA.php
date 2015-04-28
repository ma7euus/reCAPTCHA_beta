<?php

namespace app\Models;

final class TentativasReCAPTCHA {
    
    /**
     * 
     * @param \app\Models\EntityModels\TentativasReCAPTCHAModel $_tentativa
     * @return type
     */
    public function GravarTentativa(EntityModels\TentativasReCAPTCHAModel $_tentativa){
        $Db = new \app\Utils\DB\DBManager();
        return $Db->Gravar(0, 'tentativas_recaptcha', $_tentativa);
    }
    
}

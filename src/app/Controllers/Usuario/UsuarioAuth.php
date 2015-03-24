<?php

namespace app\Controllers\Usuario;

final class UsuarioAuth {

    public static $_apiKey;
    public static $_userPath = 'masdmasdmasdmasmddsm';

    /**
     * 
     * @param type $_email
     * @param type $_password
     */
    public static function AuthUserPass($_email, $_password) {
        
    }

    /**
     * 
     * @param type $_apiKey
     * @return boolean
     */
    public static function AuthApiKey($_apiKey) {
        return true;
    }

    private function GenerateApiKey(){
        
    }
}

<?php

namespace app\Controllers\Usuario;

final class UsuarioAuth {

    private static $_apiKey;

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
    
    /**
     * 
     * @return type
     */
    public function GetApiKey() {
        return UsuarioAuth::$_apiKey;
    }

    private function GenerateApiKey(){
        
    }
}

<?php

namespace app\Controllers\Usuario;

final class UsuarioAuth {

    public static $_apiKey;
    public static $_userPath;
    public static $_userID;

    /**
     * 
     * @param type $_email
     * @param type $_password
     * @return Results\UsuarioResult
     */
    public static function AuthUserPass($_email, $_password) {
        $_password = md5($_password);
        $user = new \app\Models\Usuario();
        $result = $user->AutenticarUsuario($_password, $_email);
        $retorno = new Results\UsuarioResult();
        if($result){
           $retorno->status = true;
           $retorno->apiKey = $result->apiKey;
           $retorno->idUser = $result->id;
           $retorno->dirUser = md5($result->email);
        }
        $retorno->status = false;
        return $retorno;
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

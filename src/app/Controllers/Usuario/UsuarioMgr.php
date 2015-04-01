<?php

namespace app\Controllers\Usuario;

final class UsuarioMgr {

    /**
     * 
     * @param type $_email
     * @return boolean
     */
    public function ValidarEmailUsuario($_email) {
        $args = new Arguments\UsuarioCadastroArgs();
        $args->email = $_email;
        $usuario = new UsuarioCadastro();
        return $usuario->VerificarEmail($args);
    }

    /**
     * 
     * @param \stdClass $_dados
     * @return Results\UsuarioCadastroResult
     */
    public function CadastrarUsuario(\stdClass $_dados) {
        $usuario = new UsuarioCadastro();

        $args = new Arguments\UsuarioCadastroArgs();

        $args->email = $_dados->email;
        $args->password = $_dados->pass;

        return $usuario->CadastrarNovoUsuario($args);
    }

    /**
     * 
     * @param \stdClass $_dados
     * @return Results\UsuarioResult
     */
    public function AutenticarUsuario(\stdClass $_dados){
        return UsuarioAuth::AuthUserPass($_dados->email, $_dados->pass);
    }
}

<?php

namespace app\Controllers\Usuario;

final class UsuarioCadastro {

    /**
     * 
     * @param \app\Controllers\Usuario\Arguments\UsuarioCadastroArgs $_args
     * @return boolean
     */
    public function VerificarEmail(Arguments\UsuarioCadastroArgs $_args) {
        return false;
    }

    /**
     * 
     * @param \app\Controllers\Usuario\Arguments\UsuarioCadastroArgs $_args
     * @return \app\Controllers\Usuario\Results\UsuarioCadastroResult
     */
    public function CadastrarNovoUsuario(Arguments\UsuarioCadastroArgs $_args) {
        return new Results\UsuarioCadastroResult();
    }

    /**
     * 
     * @param \app\Controllers\Usuario\Arguments\UsuarioCadastroArgs $_args
     * @return \app\Controllers\Usuario\Results\UsuarioCadastroResult
     */
    public function ObterUsuario(Arguments\UsuarioCadastroArgs $_args) {
        return new Results\UsuarioCadastroResult();
    }

}

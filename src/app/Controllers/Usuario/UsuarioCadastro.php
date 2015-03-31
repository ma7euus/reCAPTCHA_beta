<?php

namespace app\Controllers\Usuario;

final class UsuarioCadastro {

    /**
     * 
     * @param \app\Controllers\Usuario\Arguments\UsuarioCadastroArgs $_args
     * @return boolean
     */
    public function VerificarEmail(Arguments\UsuarioCadastroArgs $_args) {
        $user = new \app\Models\Usuario();
        return $user->VerificarEmail($_args->email);
    }

    /**
     * 
     * @param \app\Controllers\Usuario\Arguments\UsuarioCadastroArgs $_args
     * @return \app\Controllers\Usuario\Results\UsuarioCadastroResult
     */
    public function CadastrarNovoUsuario(Arguments\UsuarioCadastroArgs $_args) {
        $userModel = new \app\Models\EntityModels\UsuarioModel();

        //$userModel->id = 0;
        $userModel->email = $_args->email;
        $userModel->senha = $_args->password;
        $userModel->data = date('Y-m-d H:i:s');
        $userModel->apiKey = md5(date('sY:dm-H') . rand(1, 99999)) .'+'.  md5($_args->password);
        
        $user = new \app\Models\Usuario();
        $result = new Results\UsuarioCadastroResult();
        $result->idUser = $user->GravarCadastroUsuario($userModel);
        $result->status = true;
        $result->apiKey = $userModel->apiKey;
        
        return $result;
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

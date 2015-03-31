<?php

namespace app\Models;

final class Usuario {

    /**
     * 
     * @param \app\Models\EntityModels\UsuarioModel $_usuario
     */
    public function GravarCadastroUsuario(EntityModels\UsuarioModel $_usuario) {

        $Db = new \app\Utils\DB\DBManager();
        return $Db->Gravar(0, 'usuarios', $_usuario);
    }

    /**
     * 
     * @param type $_id
     * @return \app\Models\EntityModels\UsuarioModel
     */
    public function ObterUsuario($_id) {
        return new EntityModels\UsuarioModel();
    }

    /**
     * 
     * @param type $_id
     */
    public function AtualizarApiKey($_idUsuario) {
        
    }

    /**
     * 
     * @param type $_idUsuario
     * @return \app\Models\EntityModels\ArquivosModel
     */
    public function ObterArquivosUsuario($_idUsuario) {
        return new EntityModels\ArquivosModel();
    }

    /**
     * 
     * @param string $_email
     * @return boolean
     */
    public function VerificarEmail($_email) {
        $qry = "SELECT * FROM usuarios WHERE email LIKE '{$_email}' ";
        $result = \app\Utils\DB\MySQL\MySQL::Instance()->Select($qry);
        if ($result->isSuccess()) {
            $result = $result->getResult();
            if (count($result) > 0)
                return false;
        }
        return true;
    }

}

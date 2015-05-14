<?php

namespace app\Models;

final class ArquivosDigitalizados {

    /**
     * 
     * @param \app\Models\EntityModels\ArquivosDigitalizadosModel $_arquivo
     * @return type
     */
    public function GravarArquivoDigitalizado(EntityModels\ArquivosDigitalizadosModel $_arquivo) {

        $Db = new \app\Utils\DB\DBManager();
        return $Db->Gravar(0, 'arquivos_digitalizados', $_arquivo);
    }

    /**
     * 
     * @param type $_nome
     * @return \app\Models\EntityModels\ArquivosDigitalizadosModel
     */
    public function ObterArquivoPorNome($_nome) {
        $arquivo = new EntityModels\ArquivosDigitalizadosModel();
        $idUsuario = \app\Controllers\Usuario\UsuarioAuth::$_userID;
        $qry = "SELECT * FROM arquivos_digitalizados WHERE idUsuario = {$idUsuario} AND nomeImagem = '{$_nome}' LIMIT 1";
        
        $result = \app\Utils\DB\MySQL\MySQL::Instance()->Select($qry);
        if ($result->isSuccess()) {
            $arqs = $result->getResult();
            $arquivo->SetValues($arqs[0]);
        }

        return $arquivo;
    }

}

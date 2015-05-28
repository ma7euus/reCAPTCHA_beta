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
            if (count($arqs) > 0)
                $arquivo->SetValues($arqs[0]);
        }

        return $arquivo;
    }

    /**
     * 
     * @param type $_nome
     */
    public function DeletarArquivoPorNome($_nome) {
        $arq = $this->ObterArquivoPorNome($_nome);

        if ($arq->id > 0) {
            $qry = "DELETE FROM arquivos_digitalizados WHERE idUsuario = {$arq->idUsuario} AND id = {$arq->id}";
            $result = \app\Utils\DB\MySQL\MySQL::Instance()->Execute($qry);
            if ($result->isSuccess()) {
                return true;
            }
            return false;
        }
    }

    /**
     * 
     * @param type $_idArq
     */
    public static function AtribuirPalavraReconhecida($_idArq) {
        $idUsuario = \app\Controllers\Usuario\UsuarioAuth::$_userID;
        $qry = " SET @reconhecidas := (SELECT numPalavrasCorretas FROM arquivos_digitalizados WHERE id = {$_idArq}); "
                . " UPDATE arquivos_digitalizados SET numPalavrasCorretas= (@reconhecidas + 1) WHERE id = {$_idArq}; ";
        $result = \app\Utils\DB\MySQL\MySQL::Instance()->Execute($qry, true);
       // fb($result);
    }

}

<?php

namespace app\Models\EntityModels;

final class UsuarioModel extends EntityModel {

    /**
     *
     * @var int
     */
    public $id;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $senha;

    /**
     *
     * @var string
     */
    public $apiKey;

    /**
     *
     * @var \DateTime
     */
    public $data;

    /**
     *
     * @var \DateTime
     */
    public $ultimoAcesso;

    /**
     *
     * @var ArquivosModel[]
     */
    public $_Arquivos;

    public function SetDefaultValues() {
        
    }

    public function SetPrimaryKey(&$nomeDoCampoChave) {
        $nomeDoCampoChave = 'id';
    }

    public function SetTableName(&$tableName, &$tableNameAlias) {
        $tableName = 'usuarios';
        $tableNameAlias = 'user';
    }

}

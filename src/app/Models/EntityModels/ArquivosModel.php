<?php

namespace app\Models\EntityModels;

final class ArquivosModel extends EntityModel {

    /**
     *
     * @var int
     */
    public $id;

    /**
     *
     * @var int
     */
    public $idUsuario;

    /**
     *
     * @var string 
     */
    public $nome;

    /**
     *
     * @var int
     */
    public $status;

    /**
     *
     * @var string
     */
    public $referencia_texto;

    /**
     *
     * @var string
     */
    public $texto_final;

    /**
     *
     * @var \DateTime
     */
    public $data_ini;

    /**
     *
     * @var \DateTime
     */
    public $data_fim;

    /**
     *
     * @var array
     */
    public $_Palavras;

    public function SetDefaultValues() {
        
    }

    public function SetPrimaryKey(&$nomeDoCampoChave) {
        
    }

    public function SetTableName(&$tableName, &$tableNameAlias) {
        
    }

}

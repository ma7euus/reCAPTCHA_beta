<?php

namespace app\Models\EntityModels;

final class ArquivosDigitalizadosModel extends EntityModel {

    public $id;
    public $idUsuario;
    public $nomeImagem;
    public $textoProcessado;
    public $txtReferenciaPalavras;
    public $tempoOCRProcess;

    /**
     *
     * @var \DateTime
     */
    public $dtIniProcess;

    /**
     *
     * @var \DateTime
     */
    public $dtFimProcess;
    public $numTotalPalavras;
    public $numPalavrasCorretas;

    /**
     *
     * @var PalavrasModel[]
     */
    public $_Palavras;

    public $_tmpId;


    public function __construct() {
        parent::__construct();
        $this->_Palavras = array();
    }
    
    public function SetDefaultValues() {
        
    }

    public function SetPrimaryKey(&$nomeDoCampoChave) {
        
    }

    public function SetTableName(&$tableName, &$tableNameAlias) {
        
    }

    /**
     * 
     * @param \app\Models\EntityModels\PalavrasModel $_palavra
     */
    public function AddPalavra(PalavrasModel $_palavra){
        array_push($this->_Palavras, $_palavra);
    }
            
}

<?php

namespace app\Models\EntityModels;

final class PalavrasModel extends EntityModel {

    public $id;
    public $idArquivo;
    public $numTextoReferencia;
    public $texto;
    public $reconhecida;
    public $taxaAcertoOCR;
    public $numTentativas_reCAPTCHA;
    public $fragmentoImg;

    /**
     *
     * @var PalavrasReCAPTCHA
     */
    public $_PalavrasReCAPTCHA;

    public function __construct() {
        parent::__construct();
        $this->_PalavrasReCAPTCHA = array();
    }

    public function SetDefaultValues() {
        $this->reconhecida = 0;
        $this->numTentativas_reCAPTCHA = 0;
        $this->taxaAcertoOCR = 0.0;
    }

    public function SetPrimaryKey(&$nomeDoCampoChave) {
        
    }

    public function SetTableName(&$tableName, &$tableNameAlias) {
        
    }

    /**
     * 
     * @param \app\Models\EntityModels\PalavrasReCAPTCHA $_palavraReCAPTCHA
     */
    public function AddPalavraReCAPTCHA(PalavrasReCAPTCHA $_palavraReCAPTCHA) {
        array_push($this->_PalavrasReCAPTCHA, $_palavraReCAPTCHA);
    }

}

<?php

namespace app\Controllers\Arquivos\Results;

class ArquivoImpResult {
    
    /**
     *
     * @var ArquivoImpTXTResult
     */
    public $textoReferencia;
    
    /**
     *
     * @var string
     */
    public $nomeImagem;

    /**
     *
     * @var \DateInterval
     */
    public $tempo;
    /**
     *
     * @var ArquivoImpXMLResult[]
     */
    public $dadosXML;
 
    public function __construct() {
        $this->dadosXML = array();
    }
    
    /**
     * 
     * @param \app\Controllers\Arquivos\Results\ArquivoImpXMLResult $_dadosXML
     */
    public function AddDadosXML(ArquivoImpXMLResult $_dadosXML){
        array_push($this->dadosXML, $_dadosXML);
    }
}

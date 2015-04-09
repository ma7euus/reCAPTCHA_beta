<?php

namespace app\Controllers\Processadores\Results;

final class ClassificadorResult {

    /**
     *
     * @var \app\Models\EntityModels\ArquivosDigitalizadosModel
     */
    public $dadosArquivoDigitalizado;

    /**
     *
     * @var \app\Models\EntityModels\PalavrasModel[]
     */
    public $dadosPalavras;

    /**
     * 
     * @param \app\Models\EntityModels\ArquivosDigitalizadosModel $_arq
     */
    public function __construct(\app\Models\EntityModels\ArquivosDigitalizadosModel $_arq) {
        $this->dadosArquivoDigitalizado = $_arq;
        $this->dadosPalavras = array();
    }

    public function AddDadosPalavra(\app\Models\EntityModels\PalavrasModel $_palavra) {
        array_push($this->dadosPalavras, $_palavra);
        $this->dadosArquivoDigitalizado->numTotalPalavras++;
        if ($_palavra->reconhecida)
            $this->dadosArquivoDigitalizado->numPalavrasCorretas++;
    }

}

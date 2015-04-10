<?php

namespace app\Controllers\Processadores;

final class Classificador {

    /**
     * 
     * @param \app\Controllers\Arquivos\Results\ArquivoImpResult[] $_arqs
     * @return \app\Controllers\Processadores\Results\ClassificadorResult[]
     */
    public function ClassificarArquivos(array $_arqs) {
        $resultado = array();

        foreach ($_arqs as $arq) {
            $arquivoDigitalizado = new \app\Models\EntityModels\ArquivosDigitalizadosModel();
            $arquivoDigitalizado->dtIniProcess = date('Y-m-d H:i:s');
            $arquivoDigitalizado->nomeImagem = $arq->nomeImagem;
            $arquivoDigitalizado->tempoOCRProcess = $arq->tempo->s;
            $arquivoDigitalizado->txtReferenciaPalavras = $arq->textoReferencia->conteudo;
            $arquivoDigitalizado->_tmpId = $arq->tmpId;
            
            $cRetorno = new Results\ClassificadorResult($arquivoDigitalizado);
            foreach ($arq->dadosXML as $xmlResult) {
                $palavra = $this->ClassificarPalavra(new \app\Models\EntityModels\PalavrasModel($xmlResult->img_id, $xmlResult->texto, $xmlResult->certainty, $xmlResult->image->dados));
                $cRetorno->AddDadosPalavra($palavra);
            }
            if ($cRetorno->dadosArquivoDigitalizado->numTotalPalavras == $cRetorno->dadosArquivoDigitalizado->numPalavrasCorretas)
                $cRetorno->dadosArquivoDigitalizado->dtFimProcess = date('Y-m-d H:i:s');
            array_push($resultado, $cRetorno);
        }

        return $resultado;
    }

    /**
     * 
     * @param \app\Models\EntityModels\PalavrasModel $_palavra
     * @return \app\Models\EntityModels\PalavrasModel
     */
    public function ClassificarPalavra(\app\Models\EntityModels\PalavrasModel $_palavra) {
        $_palavra->reconhecida = 0;
        if ($_palavra->taxaAcertoOCR >= -2.25) {
            $_palavra->reconhecida = 1;
        }
        return $_palavra;
    }

}

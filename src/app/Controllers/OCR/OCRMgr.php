<?php

namespace app\Controllers\OCR;

use app\Controllers\Arquivos\Arguments\ArquivoArgs;

final class OCRMgr {

    /**
     * 
     * @param ArquivoArgs[] $_arquivos
     * @return \app\Controllers\OCR\Results\OCRProcessamentoResult[]
     */
    public function ProcessarArquivos(array $_arquivos) {
        $results = array();

        foreach ($_arquivos as $_arq) {
            if (\app\Utils\Functions::CreateFolder($_arq->localizacao, 'tmp')) {
                $tempDirArq = \app\Utils\Functions::GenerateUniqueID();
                /** criar diretorio temporario **/
                if (\app\Utils\Functions::CreateFolder("{$_arq->localizacao}tmp/", $tempDirArq)) {
                    $tess = new Tesseract\TesseractOCRAPI("{$_arq->localizacao}{$_arq->nome}", "{$_arq->localizacao}tmp/{$tempDirArq}/text_ref");
                    $tess->AddParametro(new Arguments\TesseractOCRAPIArgs('u', "{$_arq->localizacao}tmp/"));
                    $tess->AddParametro(new Arguments\TesseractOCRAPIArgs('i', "{$tempDirArq}"));
                    $start = new \DateTime();
                    $tess->Executar();
                    array_push($results, new Results\OCRProcessamentoResult($tempDirArq, $_arq->nome, "{$_arq->localizacao}tmp/{$tempDirArq}/", $start));
                }
            }
        }

        return $results;
    }

}

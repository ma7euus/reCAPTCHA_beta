<?php

namespace app\Controllers\OCR;

use app\Controllers\Arquivos\Arguments\ArquivoArgs;

final class OCRMgr {

    /**
     * 
     * @param ArquivoArgs[] $_arquivos
     */
    public function ProcessarArquivos(array $_arquivos) {

        foreach ($_arquivos as $_arq) {
            if (\app\Utils\Functions::CreateFolder($_arq->localizacao, 'tmp')) {
                $tempDirArq = \app\Utils\Functions::GenerateUniqueID();
                if (\app\Utils\Functions::CreateFolder("{$_arq->localizacao}tmp/", $tempDirArq)) {
                    $tess = new Tesseract\TesseractOCRAPI("{$_arq->localizacao}{$_arq->nome}", "{$_arq->localizacao}tmp/{$tempDirArq}/text_ref");
                    $tess->AddParametro(new Arguments\TesseractOCRAPIArgs('u', "{$_arq->localizacao}tmp/"));
                    $tess->AddParametro(new Arguments\TesseractOCRAPIArgs('i', "{$tempDirArq}"));
                    $tess->Executar();
                }
            }
        }
    }

}

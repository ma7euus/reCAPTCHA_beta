<?php

namespace app\Controllers\Arquivos\Imp;

use \app\Controllers\Arquivos\Arguments\ArquivoArgs;

final class ImportarDadosXML implements IImportarDados {

    /**
     * 
     * @param ArquivoArgs $_args
     * @return \app\Controllers\Arquivos\Results\ArquivoImpXMLResult Description
     */
    public function Importar(ArquivoArgs $_args) {
        $xml = new \app\Controllers\Arquivos\Results\ArquivoImpXMLResult();

        $xmlFileName = "{$_args->nome}";
        if (file_exists($xmlFileName)) {
            $xmlElement = simplexml_load_file($xmlFileName);
            $xml->texto = $xmlElement->text;
            $xml->certainty = $xmlElement->word_certainty;
            $xml->img_id = $xmlElement->img_id;
            $img = new ImportarPalavraIMG();
            $xml->SetImage($img->Importar(new ArquivoArgs($xml->img_id, 'image', 'jpg', $_args->localizacao)));
        }

        return $xml;
    }

}

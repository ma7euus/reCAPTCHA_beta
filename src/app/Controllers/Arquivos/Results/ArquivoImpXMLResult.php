<?php

namespace app\Controllers\Arquivos\Results;

final class ArquivoImpXMLResult {
 
    public $img_id;
    public $certainty;
    public $texto;
    
    /**
     *
     * @var ArquivoImpPalavraIMGResult
     */
    public $image;
    
    public function SetImage(ArquivoImpPalavraIMGResult $_img){
        $this->image = $_img;
    }
}

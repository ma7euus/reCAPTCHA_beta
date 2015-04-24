<?php

namespace app\Controllers\CAPTCHA\Results;

class GerarCAPTCHAResult {

    public $CAPTCHA_KEY;

    /**
     *
     * @var PalavrasGeradasResult[]
     */
    public $Palavras;

    public function __construct() {
        $this->Palavras = array();
    }

    public function AddPalavrasResult(PalavrasGeradasResult $_palavra) {
        array_push($this->Palavras, $_palavra);
    }

}

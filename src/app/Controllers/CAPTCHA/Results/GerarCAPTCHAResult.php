<?php

namespace app\Controllers\CAPTCHA\Results;

class GerarCAPTCHAResult {

    public $CAPTCHA_KEY;

    /**
     *
     * @var PalavrasGeradasResult[]
     */
    public $CAPTCHAS;

    public function __construct() {
        $this->CAPTCHAS = array();
        $this->CAPTCHA_KEY = '';
    }

    public function AddPalavrasResult(PalavrasGeradasResult $_palavra) {
        array_push($this->CAPTCHAS, $_palavra);
    }

}

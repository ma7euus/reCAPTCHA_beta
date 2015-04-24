<?php

namespace app\Controllers\CAPTCHA\Results;

class PalavrasGeradasResult {

    public $imgId;
    public $imgBase64;

    /**
     * 0 - Palavra nao reconhecida
     * 1 - Palavra reconhecida
     * 
     */
    public $imgOrder;

    /**
     * 
     * @param type $_imgId
     * @param type $_imgBase64
     * @param type $_imgOrder
     */
    public function __construct($_imgId, $_imgBase64, $_imgOrder) {
        $this->imgId = $_imgId;
        $this->imgBase64 = $_imgBase64;
        $this->imgOrder = $_imgOrder;
    }

}

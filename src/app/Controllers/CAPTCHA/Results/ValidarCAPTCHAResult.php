<?php

namespace app\Controllers\CAPTCHA\Results;

final class ValidarCAPTCHAResult {

    public $status;
    public $msg;
    public $_recog;

    public function __construct($_status) {
        $this->status = $_status;
        $this->_recog = false;
    }
}

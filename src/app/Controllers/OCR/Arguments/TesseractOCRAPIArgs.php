<?php

namespace app\Controllers\OCR\Arguments;

final class TesseractOCRAPIArgs {

    public $letter;
    public $argument;

    public function __construct($_letter, $_argument) {
        $this->letter = $_letter;
        $this->argument = $_argument;
    }

}

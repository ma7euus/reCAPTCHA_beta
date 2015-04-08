<?php

namespace app\Controllers\OCR\Tesseract;

final class TesseractOCRAPI {

    /**
     *
     * @var \app\Controllers\OCR\Arguments\TesseractOCRAPIArgs[]
     */
    private $_tessArgs = array();

    public function __construct($_img_file_path, $_txt_file_result, $_lang = 'por' /* or eng */) {
        // array_push($this->_tessArgs, new \app\Controllers\OCR\Arguments\TesseractOCRAPIArgs(null, 'sudo'));
        // array_push($this->_tessArgs, new \app\Controllers\OCR\Arguments\TesseractOCRAPIArgs('u', 'mateus'));
        array_push($this->_tessArgs, new \app\Controllers\OCR\Arguments\TesseractOCRAPIArgs(null, 'tesseract'));
        array_push($this->_tessArgs, new \app\Controllers\OCR\Arguments\TesseractOCRAPIArgs(null, $_img_file_path));
        array_push($this->_tessArgs, new \app\Controllers\OCR\Arguments\TesseractOCRAPIArgs(null, $_txt_file_result));
        array_push($this->_tessArgs, new \app\Controllers\OCR\Arguments\TesseractOCRAPIArgs('l', $_lang));
    }

    /**
     * 
     * @param \app\Controllers\OCR\Arguments\TesseractOCRAPIArgs $_args
     */
    public function AddParametro(\app\Controllers\OCR\Arguments\TesseractOCRAPIArgs $_args) {
        array_push($this->_tessArgs, $_args);
    }

    public function Executar() {
        $commandLine = '';
        foreach ($this->_tessArgs as $_arg) {
            if ($_arg->letter)
                $commandLine .= " -{$_arg->letter} {$_arg->argument} ";
            else
                $commandLine .= " {$_arg->argument} ";
        }
        $commandLine = str_replace('  ', ' ', $commandLine);

        //fb($commandLine);
        $out = exec($commandLine);
    }

}

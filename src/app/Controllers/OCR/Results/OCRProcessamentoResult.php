<?php

namespace app\Controllers\OCR\Results;

final class OCRProcessamentoResult {

    public $tmpDirName;
    public $arqNameRef;
    public $path;
    public $tmpId;

    /**
     *
     * @var \DateInterval
     */
    public $processingTime;

    public function __construct($_tmpDirName, $_arqNameRef, $_path, \DateTime $_startProcess, $_tmpId) {
        $this->tmpDirName = $_tmpDirName;
        $this->arqNameRef = $_arqNameRef;
        $this->path = $_path;
        $this->tmpId = $_tmpId;
        $this->SetProcessingTime($_startProcess, new \DateTime());
    }

    public function SetProcessingTime(\DateTime $_start, \DateTime $_end) {
        $this->processingTime = $_start->diff($_end);
    }

}

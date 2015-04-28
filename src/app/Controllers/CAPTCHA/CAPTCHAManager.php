<?php

namespace app\Controllers\CAPTCHA;

class CAPTCHAManager {

    /**
     * 
     * @return \app\Controllers\CAPTCHA\Results\GerarCAPTCHAResult
     */
    public function GerarCAPTCHA() {
        $captchas = new Results\GerarCAPTCHAResult();
        
        $palavras = new \app\Models\Palavras();
        
        $reco = $palavras->ObterPalavraParaReconhecimento();
        $reco->fragmentoImg = base64_encode(\app\Utils\Functions::DistorcerImgCAPTCHA(base64_decode($reco->fragmentoImg)));
        $captcha = $palavras->ObterPalavraCAPTCHA();
        $captcha->fragmentoImg = base64_encode(\app\Utils\Functions::DistorcerImgCAPTCHA(base64_decode($captcha->fragmentoImg)));
        
        $captchas->CAPTCHA_KEY = base64_encode($reco->id . "_" . $captcha->id);
        $captchas->AddPalavrasResult(new Results\PalavrasGeradasResult($reco->id, $reco->fragmentoImg, 0));
        $captchas->AddPalavrasResult(new Results\PalavrasGeradasResult($captcha->id, $captcha->fragmentoImg, 1));
        
        return $captchas;
    }

    public function ValidarCAPTCHA() {
        
    }

    private function GravarResultado() {
        
    }

}

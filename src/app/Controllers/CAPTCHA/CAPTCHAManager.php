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

    /**
     * 
     * @param \stdClass $_dados
     * @return \app\Controllers\CAPTCHA\Results\ValidarCAPTCHAResult
     */
    public function ValidarCAPTCHA(\stdClass $_dados) {
        $resultado = new Results\ValidarCAPTCHAResult(false);

        $ids = explode('_', base64_decode($_dados->keyCAPTCHA));

        //$textField = str_replace(' ', '', $_dados->textValidate);
        $textField = $_dados->textValidate;

        $palavras = new \app\Models\Palavras();
        $palavra = $palavras->ObterPalavraPorId($ids[1]);
        $letrasPalavraTest = strlen($palavra->texto);

        $strCaptchaTest = trim(substr($textField, strlen($textField) - ($letrasPalavraTest), $letrasPalavraTest));

        if (strcmp($strCaptchaTest, trim($palavra->texto)) == 0) {
            $resultado->status = true;
        }

        $palavraRecon = trim(substr($textField, 0, strlen($textField) - $letrasPalavraTest));

        if (strlen($palavraRecon) > 2 && $resultado->status) {
            $palavra = $palavras->ObterPalavraPorId($ids[0]);
            if ($palavra->id == $ids[0]) {
                $jaReconhecida = $palavra->reconhecida == 1 ? true : false;
                if (strcmp($palavraRecon, trim($palavra->texto)) == 0) {
                    $palavra->numTentativas_reCAPTCHA = 10;
                    $palavra->reconhecida = 1;
                } else {

                    $reCaptcha = new \app\Models\EntityModels\TentativasReCAPTCHAModel();
                    $reCaptcha->idPalavra = $palavra->id;
                    $reCaptcha->textoDigitado = $palavraRecon;

                    $recap = new \app\Models\TentativasReCAPTCHA();
                    $recap->GravarTentativa($reCaptcha);

                    if ($palavra->numTentativas_reCAPTCHA >= 9) {
                        $palavra->reconhecida = 1;
                        $palavra->texto = $recap->ObterTextoMaiorRecorencia($palavra->id);
                    }

                    $palavra->numTentativas_reCAPTCHA++;
                }
                $palavras->AtualizarTentativasReCaptcha($palavra);
                if($palavra->reconhecida && $jaReconhecida === false){
                    \app\Models\ArquivosDigitalizados::AtribuirPalavraReconhecida($palavra->idArquivo);
                }
                    
            }
        }

        return $resultado;
    }

}

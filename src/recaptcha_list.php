<?php

include_once './config.php';

?>
<html>
    <head>
        
    </head>
    <body>
        <div>
            <table border='1' style="width: auto; table-layout: auto; font-family:'Times New Roman' ">
                <thead>
                <tr>
                 <th>Ordem</th>
                 <th>Fragmento</th>
                 <th>Texto OCR</th>
                 <th>Taxa Certeza</th>
                 <th>Tentativas</th>
                </tr>
                </thead>
<?php
$qry = "SELECT p.* FROM palavras p "
        . "JOIN arquivos_digitalizados a ON p.idArquivo = a.id "
        . " WHERE p.reconhecida = 0 AND p.texto REGEXP '[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ?!0-9]{1,25}' "
        . " ORDER BY a.id ASC, p.taxaAcertoOCR ASC, p.numTentativas_reCAPTCHA DESC ";
//fb($qry);
$result = \app\Utils\DB\MySQL\MySQL::Instance()->Select($qry);
if ($result->isSuccess()) {
    $r = $result->getResult();
    if (count($r) > 0) {
        foreach ($r as $i => $val){
            ?>
                <tr><?php $taxa = number_format($val["taxaAcertoOCR"], 2, ",", ".");?>
                    <td style="text-align: center; font-weight: bold;"><?=$i + 1?>º</td>
<!--                    <td style="text-align: center;"><img style="max-width: 100px; max-height: 50px" src="data:image/jpg;base64,<?= base64_encode(app\Utils\Functions::DistorcerImgCAPTCHA(base64_decode($val["fragmentoImg"])))?>"/></td>-->
                    <td style="text-align: center;"><img style="max-width: 100px; max-height: 50px" src="data:image/jpg;base64,<?=$val["fragmentoImg"]?>"/></td>
                    <td style="text-align: center"><?=$val["texto"]?></td>
                    <td style="text-align: center"><?=$taxa?></td>
                    <td style="text-align: center"><?=$val["numTentativas_reCAPTCHA"]?></td>
                </tr>
            <?php
        }
    }
}

?>
            </table>
        </div>
</body>
</html>
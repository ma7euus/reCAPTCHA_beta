<?php

error_reporting(E_ALL ^ E_NOTICE);

require_once '../app/libs/php/firephp/fb.php';
ob_start();

include_once '../app/libs/php/ocr/tesseract.php';

$api = new TessBaseAPI;
$api->Init(".", "eng", $mode_or_oem = OEM_DEFAULT);
$api->SetPageSegMode(PSM_AUTO);

$mImgFile = "img/eurotext.jpg";
$handle = fopen($mImgFile, "rb");

$mBuffer = fread($handle, filesize($mImgFile));

print strlen($mBuffer);

print_r($api->GetInitLanguagesAsString());
//$api->SetImage($mBuffer);
//

//die;
$result = ProcessPagesBuffer($mBuffer, strlen($mBuffer), $api);

print "result(ProcessPagesBuffer)=";
echo "</br>";
print $result;
echo "</br>";
$result = ProcessPagesFileStream($mImgFile, $api);
print "result(ProcessPagesFileStream)=";
echo "</br>";
print $result;

echo "<p>";
//print_r($api->DumpPGM($filename));

echo "<p>";
fb($api->GetCubeRecoContext());
//fb($api->AllWordConfidences());

//fb($api->tesseract());
//$res = $api->GetTextlines(null, null);
//fb($res[]);

echo $api->GetHOCRText(0);

//$res = $api->GetTextlines(null, null);

//fb($res[0]->x);
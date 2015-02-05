<?php

/* ----------------------------------------------------------------------------
 * This file was automatically generated by SWIG (http://www.swig.org).
 * Version 2.0.4
 * 
 * This file is not intended to be easily readable and contains a number of 
 * coding conventions designed to improve portability and efficiency. Do not make
 * changes to this file unless you know what you are doing--modify the SWIG 
 * interface file instead. 
 * ----------------------------------------------------------------------------- */

// Try to load our extension if it's not already loaded.
if (!extension_loaded('tesseract')) {
    if (strtolower(substr(PHP_OS, 0, 3)) === 'win') {
        if (!dl('php_tesseract.dll'))
            return;
    } else {
        // PHP_SHLIB_SUFFIX gives 'dylib' on MacOS X but modules are 'so'.
        if (PHP_SHLIB_SUFFIX === 'dylib') {
            if (!dl('tesseract.so'))
                return;
        } else {
            if (!dl('tesseract.' . PHP_SHLIB_SUFFIX))
                return;
        }
    }
}

abstract class tesseract {

    static function kPointsPerInch_get() {
        return kPointsPerInch_get();
    }

    const PT_UNKNOWN = 0;
    const PT_FLOWING_TEXT = PT_FLOWING_TEXT;
    const PT_HEADING_TEXT = PT_HEADING_TEXT;
    const PT_PULLOUT_TEXT = PT_PULLOUT_TEXT;
    const PT_EQUATION = PT_EQUATION;
    const PT_INLINE_EQUATION = PT_INLINE_EQUATION;
    const PT_TABLE = PT_TABLE;
    const PT_VERTICAL_TEXT = PT_VERTICAL_TEXT;
    const PT_CAPTION_TEXT = PT_CAPTION_TEXT;
    const PT_FLOWING_IMAGE = PT_FLOWING_IMAGE;
    const PT_HEADING_IMAGE = PT_HEADING_IMAGE;
    const PT_PULLOUT_IMAGE = PT_PULLOUT_IMAGE;
    const PT_HORZ_LINE = PT_HORZ_LINE;
    const PT_VERT_LINE = PT_VERT_LINE;
    const PT_NOISE = PT_NOISE;
    const PT_COUNT = PT_COUNT;

    static function PTIsLineType($type) {
        return PTIsLineType($type);
    }

    static function PTIsImageType($type) {
        return PTIsImageType($type);
    }

    static function PTIsTextType($type) {
        return PTIsTextType($type);
    }

    static function kPolyBlockNames_get() {
        return kPolyBlockNames_get();
    }

    const ORIENTATION_PAGE_UP = 0;
    const ORIENTATION_PAGE_RIGHT = 1;
    const ORIENTATION_PAGE_DOWN = 2;
    const ORIENTATION_PAGE_LEFT = 3;
    const WRITING_DIRECTION_LEFT_TO_RIGHT = 0;
    const WRITING_DIRECTION_RIGHT_TO_LEFT = 1;
    const WRITING_DIRECTION_TOP_TO_BOTTOM = 2;
    const TEXTLINE_ORDER_LEFT_TO_RIGHT = 0;
    const TEXTLINE_ORDER_RIGHT_TO_LEFT = 1;
    const TEXTLINE_ORDER_TOP_TO_BOTTOM = 2;
    const PSM_OSD_ONLY = 0;
    const PSM_AUTO_OSD = PSM_AUTO_OSD;
    const PSM_AUTO_ONLY = PSM_AUTO_ONLY;
    const PSM_AUTO = PSM_AUTO;
    const PSM_SINGLE_COLUMN = PSM_SINGLE_COLUMN;
    const PSM_SINGLE_BLOCK_VERT_TEXT = PSM_SINGLE_BLOCK_VERT_TEXT;
    const PSM_SINGLE_BLOCK = PSM_SINGLE_BLOCK;
    const PSM_SINGLE_LINE = PSM_SINGLE_LINE;
    const PSM_SINGLE_WORD = PSM_SINGLE_WORD;
    const PSM_CIRCLE_WORD = PSM_CIRCLE_WORD;
    const PSM_SINGLE_CHAR = PSM_SINGLE_CHAR;
    const PSM_COUNT = PSM_COUNT;
    const RIL_BLOCK = 0;
    const RIL_PARA = RIL_PARA;
    const RIL_TEXTLINE = RIL_TEXTLINE;
    const RIL_WORD = RIL_WORD;
    const RIL_SYMBOL = RIL_SYMBOL;
    const JUSTIFICATION_UNKNOWN = 0;
    const JUSTIFICATION_LEFT = JUSTIFICATION_LEFT;
    const JUSTIFICATION_CENTER = JUSTIFICATION_CENTER;
    const JUSTIFICATION_RIGHT = JUSTIFICATION_RIGHT;
    const OEM_TESSERACT_ONLY = 0;
    const OEM_CUBE_ONLY = OEM_CUBE_ONLY;
    const OEM_TESSERACT_CUBE_COMBINED = OEM_TESSERACT_CUBE_COMBINED;
    const OEM_DEFAULT = OEM_DEFAULT;
    const MAX_NUM_INT_FEATURES = MAX_NUM_INT_FEATURES;

    static function isLibTiff() {
        return isLibTiff();
    }

    static function isLibLept() {
        return isLibLept();
    }

    static function ProcessPagesWrapper($image, $api) {
        return ProcessPagesWrapper($image, $api);
    }

    static function ProcessPagesPix($image, $api) {
        return ProcessPagesPix($image, $api);
    }

    static function ProcessPagesFileStream($image, $api) {
        return ProcessPagesFileStream($image, $api);
    }

    static function ProcessPagesBuffer($buffer, $fileLen, $api) {
        return ProcessPagesBuffer($buffer, $fileLen, $api);
    }

    static function ProcessPagesRaw($image, $api) {
        return ProcessPagesRaw($image, $api);
    }

    const suck = suck;

}

/* PHP Proxy Classes */

class TessBaseAPI {

    public $_cPtr = null;
    protected $_pData = array();

    function __set($var, $value) {
        if ($var === 'thisown')
            return swig_tesseract_alter_newobject($this->_cPtr, $value);
        $this->_pData[$var] = $value;
    }

    function __isset($var) {
        if ($var === 'thisown')
            return true;
        return array_key_exists($var, $this->_pData);
    }

    function __get($var) {
        if ($var === 'thisown')
            return swig_tesseract_get_newobject($this->_cPtr);
        return $this->_pData[$var];
    }

    function __construct($res = null) {
        if (is_resource($res) && get_resource_type($res) === '_p_tesseract__TessBaseAPI') {
            $this->_cPtr = $res;
            return;
        }
        $this->_cPtr = new_TessBaseAPI();
    }

    static function Version() {
        return TessBaseAPI_Version();
    }

    function SetInputName($name) {
        TessBaseAPI_SetInputName($this->_cPtr, $name);
    }

    function SetOutputName($name) {
        TessBaseAPI_SetOutputName($this->_cPtr, $name);
    }

    function SetVariable($name, $value) {
        return TessBaseAPI_SetVariable($this->_cPtr, $name, $value);
    }

    function SetDebugVariable($name, $value) {
        return TessBaseAPI_SetDebugVariable($this->_cPtr, $name, $value);
    }

    function GetIntVariable($name, $value) {
        return TessBaseAPI_GetIntVariable($this->_cPtr, $name, $value);
    }

    function GetBoolVariable($name, $value) {
        return TessBaseAPI_GetBoolVariable($this->_cPtr, $name, $value);
    }

    function GetDoubleVariable($name, $value) {
        return TessBaseAPI_GetDoubleVariable($this->_cPtr, $name, $value);
    }

    function GetStringVariable($name) {
        return TessBaseAPI_GetStringVariable($this->_cPtr, $name);
    }

    function PrintVariables($fp) {
        TessBaseAPI_PrintVariables($this->_cPtr, $fp);
    }

    function GetVariableAsString($name, $val) {
        return TessBaseAPI_GetVariableAsString($this->_cPtr, $name, $val);
    }

    function Init($datapath, $language, $mode_or_oem = null, $configs = null, $configs_size = null, $vars_vec = null, $vars_values = null, $set_only_non_debug_params = null) {
        switch (func_num_args()) {
            case 2: $r = TessBaseAPI_Init($this->_cPtr, $datapath, $language);
                break;
            case 3: $r = TessBaseAPI_Init($this->_cPtr, $datapath, $language, $mode_or_oem);
                break;
            case 4: $r = TessBaseAPI_Init($this->_cPtr, $datapath, $language, $mode_or_oem, $configs);
                break;
            case 5: $r = TessBaseAPI_Init($this->_cPtr, $datapath, $language, $mode_or_oem, $configs, $configs_size);
                break;
            case 6: $r = TessBaseAPI_Init($this->_cPtr, $datapath, $language, $mode_or_oem, $configs, $configs_size, $vars_vec);
                break;
            case 7: $r = TessBaseAPI_Init($this->_cPtr, $datapath, $language, $mode_or_oem, $configs, $configs_size, $vars_vec, $vars_values);
                break;
            default: $r = TessBaseAPI_Init($this->_cPtr, $datapath, $language, $mode_or_oem, $configs, $configs_size, $vars_vec, $vars_values, $set_only_non_debug_params);
        }
        return $r;
    }

    function GetInitLanguagesAsString() {
        return TessBaseAPI_GetInitLanguagesAsString($this->_cPtr);
    }

    function GetLoadedLanguagesAsVector($langs) {
        TessBaseAPI_GetLoadedLanguagesAsVector($this->_cPtr, $langs);
    }

    function InitLangMod($datapath, $language) {
        return TessBaseAPI_InitLangMod($this->_cPtr, $datapath, $language);
    }

    function InitForAnalysePage() {
        TessBaseAPI_InitForAnalysePage($this->_cPtr);
    }

    function ReadConfigFile($filename) {
        TessBaseAPI_ReadConfigFile($this->_cPtr, $filename);
    }

    function ReadDebugConfigFile($filename) {
        TessBaseAPI_ReadDebugConfigFile($this->_cPtr, $filename);
    }

    function SetPageSegMode($mode) {
        TessBaseAPI_SetPageSegMode($this->_cPtr, $mode);
    }

    function GetPageSegMode() {
        return TessBaseAPI_GetPageSegMode($this->_cPtr);
    }

    function TesseractRect($imagedata, $bytes_per_pixel, $bytes_per_line, $left, $top, $width, $height) {
        return TessBaseAPI_TesseractRect($this->_cPtr, $imagedata, $bytes_per_pixel, $bytes_per_line, $left, $top, $width, $height);
    }

    function ClearAdaptiveClassifier() {
        TessBaseAPI_ClearAdaptiveClassifier($this->_cPtr);
    }

    function SetImage($imagedata_or_pix, $width = null, $height = null, $bytes_per_pixel = null, $bytes_per_line = null) {
        switch (func_num_args()) {
            case 1: TessBaseAPI_SetImage($this->_cPtr, $imagedata_or_pix);
                break;
            case 2: TessBaseAPI_SetImage($this->_cPtr, $imagedata_or_pix, $width);
                break;
            case 3: TessBaseAPI_SetImage($this->_cPtr, $imagedata_or_pix, $width, $height);
                break;
            case 4: TessBaseAPI_SetImage($this->_cPtr, $imagedata_or_pix, $width, $height, $bytes_per_pixel);
                break;
            default: TessBaseAPI_SetImage($this->_cPtr, $imagedata_or_pix, $width, $height, $bytes_per_pixel, $bytes_per_line);
        }
    }

    function SetSourceResolution($ppi) {
        TessBaseAPI_SetSourceResolution($this->_cPtr, $ppi);
    }

    function SetRectangle($left, $top, $width, $height) {
        TessBaseAPI_SetRectangle($this->_cPtr, $left, $top, $width, $height);
    }

    function GetThresholdedImage() {
        return TessBaseAPI_GetThresholdedImage($this->_cPtr);
    }

    function GetRegions($pixa) {
        return TessBaseAPI_GetRegions($this->_cPtr, $pixa);
    }

    function GetTextlines($pixa, $blockids) {
        return TessBaseAPI_GetTextlines($this->_cPtr, $pixa, $blockids);
    }

    function GetStrips($pixa, $blockids) {
        return TessBaseAPI_GetStrips($this->_cPtr, $pixa, $blockids);
    }

    function GetWords($pixa) {
        return TessBaseAPI_GetWords($this->_cPtr, $pixa);
    }

    function GetConnectedComponents($cc) {
        return TessBaseAPI_GetConnectedComponents($this->_cPtr, $cc);
    }

    function GetComponentImages($level, $text_only, $pixa, $blockids) {
        return TessBaseAPI_GetComponentImages($this->_cPtr, $level, $text_only, $pixa, $blockids);
    }

    function GetThresholdedImageScaleFactor() {
        return TessBaseAPI_GetThresholdedImageScaleFactor($this->_cPtr);
    }

    function DumpPGM($filename) {
        TessBaseAPI_DumpPGM($this->_cPtr, $filename);
    }

    function AnalyseLayout() {
        return TessBaseAPI_AnalyseLayout($this->_cPtr);
    }

    function Recognize($monitor) {
        return TessBaseAPI_Recognize($this->_cPtr, $monitor);
    }

    function RecognizeForChopTest($monitor) {
        return TessBaseAPI_RecognizeForChopTest($this->_cPtr, $monitor);
    }

    function ProcessPages($filename, $retry_config, $timeout_millisec, $text_out) {
        return TessBaseAPI_ProcessPages($this->_cPtr, $filename, $retry_config, $timeout_millisec, $text_out);
    }

    function ProcessPage($pix, $page_index, $filename, $retry_config, $timeout_millisec, $text_out) {
        return TessBaseAPI_ProcessPage($this->_cPtr, $pix, $page_index, $filename, $retry_config, $timeout_millisec, $text_out);
    }

    function GetIterator() {
        return TessBaseAPI_GetIterator($this->_cPtr);
    }

    function GetMutableIterator() {
        return TessBaseAPI_GetMutableIterator($this->_cPtr);
    }

    function GetUTF8Text() {
        return TessBaseAPI_GetUTF8Text($this->_cPtr);
    }

    function GetHOCRText($page_number) {
        return TessBaseAPI_GetHOCRText($this->_cPtr, $page_number);
    }

    function GetBoxText($page_number) {
        return TessBaseAPI_GetBoxText($this->_cPtr, $page_number);
    }

    function GetUNLVText() {
        return TessBaseAPI_GetUNLVText($this->_cPtr);
    }

    function MeanTextConf() {
        return TessBaseAPI_MeanTextConf($this->_cPtr);
    }

    function AllWordConfidences() {
        return TessBaseAPI_AllWordConfidences($this->_cPtr);
    }

    function AdaptToWordStr($mode, $wordstr) {
        return TessBaseAPI_AdaptToWordStr($this->_cPtr, $mode, $wordstr);
    }

    function Clear() {
        TessBaseAPI_Clear($this->_cPtr);
    }

    function End() {
        TessBaseAPI_End($this->_cPtr);
    }

    function IsValidWord($word) {
        return TessBaseAPI_IsValidWord($this->_cPtr, $word);
    }

    function GetTextDirection($out_offset, $out_slope) {
        return TessBaseAPI_GetTextDirection($this->_cPtr, $out_offset, $out_slope);
    }

    function SetFillLatticeFunc($f) {
        TessBaseAPI_SetFillLatticeFunc($this->_cPtr, $f);
    }

    function DetectOS($arg1) {
        return TessBaseAPI_DetectOS($this->_cPtr, $arg1);
    }

    function GetFeaturesForBlob($blob, $denorm, $int_features, $num_features, $FeatureOutlineIndex) {
        TessBaseAPI_GetFeaturesForBlob($this->_cPtr, $blob, $denorm, $int_features, $num_features, $FeatureOutlineIndex);
    }

    static function FindRowForBox($blocks, $left, $top, $right, $bottom) {
        return TessBaseAPI_FindRowForBox($blocks, $left, $top, $right, $bottom);
    }

    function RunAdaptiveClassifier($blob, $denorm, $num_max_matches, $unichar_ids, $ratings, $num_matches_returned) {
        TessBaseAPI_RunAdaptiveClassifier($this->_cPtr, $blob, $denorm, $num_max_matches, $unichar_ids, $ratings, $num_matches_returned);
    }

    function GetUnichar($unichar_id) {
        return TessBaseAPI_GetUnichar($this->_cPtr, $unichar_id);
    }

    function GetDawg($i) {
        return TessBaseAPI_GetDawg($this->_cPtr, $i);
    }

    function NumDawgs() {
        return TessBaseAPI_NumDawgs($this->_cPtr);
    }

    static function MakeTessOCRRow($baseline, $xheight, $descender, $ascender) {
        return TessBaseAPI_MakeTessOCRRow($baseline, $xheight, $descender, $ascender);
    }

    static function MakeTBLOB($pix) {
        return TessBaseAPI_MakeTBLOB($pix);
    }

    static function NormalizeTBLOB($tblob, $row, $numeric_mode, $denorm) {
        TessBaseAPI_NormalizeTBLOB($tblob, $row, $numeric_mode, $denorm);
    }

    function tesseract() {
        return TessBaseAPI_tesseract($this->_cPtr);
    }

    function oem() {
        return TessBaseAPI_oem($this->_cPtr);
    }

    function InitTruthCallback($cb) {
        TessBaseAPI_InitTruthCallback($this->_cPtr, $cb);
    }

    function GetCubeRecoContext() {
        return TessBaseAPI_GetCubeRecoContext($this->_cPtr);
    }

    function set_min_orientation_margin($margin) {
        TessBaseAPI_set_min_orientation_margin($this->_cPtr, $margin);
    }

    function GetBlockTextOrientations($block_orientation, $vertical_writing) {
        TessBaseAPI_GetBlockTextOrientations($this->_cPtr, $block_orientation, $vertical_writing);
    }

    function FindLinesCreateBlockList() {
        return TessBaseAPI_FindLinesCreateBlockList($this->_cPtr);
    }

    static function DeleteBlockList($block_list) {
        TessBaseAPI_DeleteBlockList($block_list);
    }

}

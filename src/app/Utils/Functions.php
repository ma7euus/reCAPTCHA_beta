<?php

namespace app\Utils;

final class Functions {

    /**
     * 
     * @param string $_local
     * @param string $_name
     * @return boolean
     */
    public static function CreateFolder($_local = '/tmp/', $_name = 'xxxx') {
        $path = $_local . $_name;
        if (!file_exists($path)) {
            return (mkdir($path, 0777, true) ? chmod($path, 0777) : false);
        }
        return true;
    }

    /**
     * Verifica se uma string começa com outra
     * @param string $string Onde procurar
     * @param string $with String inicial
     * @param boolean $caseSensitive Com ou sem case sensitive
     * @return boolean
     */
    public static function StringStartsWith($string, $with, $caseSensitive = true) {
        if (!$caseSensitive)
            return strtolower(substr($string, 0, strlen($with))) === strtolower($with);

        return substr($string, 0, strlen($with)) === $with;
    }

    /**
     * Verifica se uma string termina com outra
     * @param string $string Onde procurar
     * @param string $with String final
     * @param boolean $caseSensitive Com ou sem case sensitive
     * @return boolean
     */
    public static function StringEndsWith($string, $with, $caseSensitive = true) {
        if (!$caseSensitive)
            return strtolower(substr($string, strlen($string) - strlen($with), strlen($string))) === strtolower($with);

        return substr($string, strlen($string) - strlen($with), strlen($string)) === $with;
    }

    /**
     * Verifica se uma string contem outra
     * @param string $string A string onde procurar
     * @param string $search A string a ser procurada
     * @param boolean $caseSensitive Se case sensitive ou nao
     * @return boolean
     */
    public static function StringContains($string, $search, $caseSensitive = true) {
        if (!$caseSensitive)
            return strstr(strtolower($string), strtolower($search), false);

        return strstr($string, $search, false);
    }

    /**
     * 
     * @return type
     */
    public static function GenerateUniqueID() {
        return md5(uniqid(rand(), true));
    }

    /**
     * 
     * @param type $_dir
     */
    public static function ForceRMDir($_dir) {

        if ($dd = opendir($_dir)) {
            while (false !== ($arq = readdir($dd))) {
                if ($arq != "." && $arq != "..") {
                    $path = "$_dir/$arq";
                    if (is_dir($path)) {
                        Functions::ForceRMDir($path);
                    } elseif (is_file($path)) {
                        unlink($path);
                    }
                }
            }
            closedir($dd);
        }
        rmdir($_dir);
    }

    /**
     * 
     * @param type $_img
     * @return \Imagick
     */
    public static function DistorcerImgCAPTCHA($_img) {

        $draw = new \ImagickDraw();

        $draw->setStrokeColor("#151715");
        $draw->setStrokeWidth(2);

        $imagick = new \Imagick();
        $imagick->readimageblob($_img);

        //if($imagick->getimageheight() < 30)
        //    return $imagick;
        
        $draw->line($imagick->getimagewidth() + rand(0, 35), $imagick->getimageheight(), 0, 0);
        $imagick->drawImage($draw);

        $points = array(
            '0.' . rand(5, 9), 0,
            '0.' . rand(1, 9), 0.9,
            rand(20, 50), rand(10, 30)
        );
        $imagick->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_BACKGROUND);
        $imagick->distortImage(\Imagick::DISTORTION_AFFINEPROJECTION, $points, TRUE);
        //$imagick->resizeimage(100, 50, null, 1);
        /**$points = array(
            rand(3, 4) . '.' . rand(0, 9), 0.071451,
            0.187838, 0.799032,
            rand(1, 2) . '.' . rand(2, 8), -24.470275, 0.006258, 0.000715
        );

        $imagick->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_BACKGROUND);
        $imagick->distortImage(\Imagick::DISTORTION_PERSPECTIVEPROJECTION, $points, TRUE);
*/
        return $imagick;
    }

}

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

}

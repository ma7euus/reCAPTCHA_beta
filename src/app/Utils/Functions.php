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
            return mkdir($path, 0777);
        }
        return true;
    }

}

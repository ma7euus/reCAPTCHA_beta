<?php

namespace app\util;

class Autoloader {

    private static $instance;

    public function __construct() {
        spl_autoload_register(array($this, 'autoload'));
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function autoload($class) {
        $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

        require APP_SERVER_DIR . $class . '.php';
    }

}

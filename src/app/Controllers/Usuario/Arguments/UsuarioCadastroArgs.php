<?php

namespace app\Controllers\Usuario\Arguments;

final class UsuarioCadastroArgs {

    public $id;
    public $email;
    public $password;
    private $_key;

    public function __construct() {
       // $this->email = $_dados->email;
       // $this->password = $_dados->pass;
    }

}

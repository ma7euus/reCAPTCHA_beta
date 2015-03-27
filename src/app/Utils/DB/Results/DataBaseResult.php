<?php

namespace app\Utils\DB\Results;

final class DataBaseResult {

    private $sucess = false;
    private $result;

    /**
     * @var DataBaseResultArgs
     */
    private $args;

    public function __construct($success, $result, DataBaseResultArgs $args) {
        $this->sucess = $success;
        $this->result = $result;
        $this->args = $args;
    }

    /**
     * If any errors occurred or not
     * @return int
     */
    public function isSuccess() {
        return $this->sucess;
    }

    /**
     * If a 'SELECT', returns an array of data
     * @return array
     */
    public function getResult() {
        return $this->result;
    }

    /**
     * 
     * @return DataBaseResult additional Information
     */
    public function getDetails() {
        return $this->args;
    }

    public function nextResult() {
        $this->args->nextResult();
    }

    public function getAffectedRows() {
        return $this->args->affectedRows;
    }

}

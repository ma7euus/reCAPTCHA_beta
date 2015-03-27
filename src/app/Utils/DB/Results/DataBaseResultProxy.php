<?php

namespace app\Utils\DB\Results;

final class DataBaseResultProxy {

    const propertySuccess = "success";
    const propertyResult = "result";
    const propertyArgs = "args";

    public $success = false;
    public $result;

    /**
     * @var DataBaseResultArgs
     */
    public $args;

    public function __construct() {
        
    }

    /**
     * @return DataBaseResult
     */
    public function getDBResult() {
        return new DataBaseResult($this->success, $this->result, $this->args);
    }

    /**
     * @return DataBaseResultProxy
     */
    public function Set($property, $value) {
        if (isset($property)) {
            $this->{$property} = $value;
        }

        return $this;
    }

}
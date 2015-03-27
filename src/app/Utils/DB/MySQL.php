<?php

namespace app\Utils\DB;

class MySQL {

    /**
     * @var \mysqli
     */
    public $connection;
    private static $singleton;

    /**
     * 
     * @param type boolean
     * @return type
     * @throws \Exception
     */
    public function __construct() {
        if (isset(MySQL::$singleton)) {
            $this->connection = MySQL::$singleton->connection;
            return;
        }

        $config = parse_ini_file(__DIR__ . DIRECTORY_SEPARATOR . 'config.ini');

        $config["port"] = strlen($config["port"] > 1) ? $config["port"] : null;

        try {
            $this->connection = new \mysqli($config["host"], $config["username"], $config["passwd"], $config["dbname"], $config["port"]);
            if ($this->connection->connect_errno) {
                throw new \Exception('Could not connect to the database: ' . $this->connection->connect_error);
            }
        } catch (\Exception $exp) {
            throw new \Exception($exp->getMessage());
        }
    }

    /**
     * @return MySQL
     */
    public static function Instance() {
        if (!isset(MySQL::$singleton) || MySQL::$singleton == null) {
            MySQL::$singleton = new MySQL();
        }

        return MySQL::$singleton;
    }

    /**
     * 
     * @param type $unescapedString
     * @return type
     */
    public function EscapeString($unescapedString) {
        return $this->connection->real_escape_string($unescapedString);
    }

    public function SetCharset($charset) {
        $this->connection->set_charset($charset);
    }

    public function StartTransaction() {
        $this->connection->autocommit(FALSE);
        $this->connection->begin_transaction();
    }

    public function CommitTransaction() {
        $this->connection->commit();
        $this->connection->autocommit(TRUE);
    }

    public function Rollback() {
        $this->connection->rollback();
        $this->connection->autocommit(TRUE);
    }

    /*
     * @return result\DataBaseResult
     */

    public function Select($qry, $resultType = MYSQLI_ASSOC) {
        $result = $this->connection->query($qry);

        if (!$result) {
            if (isset($result) && $result instanceof \mysqli_result) {
                $result->free();
            }

            return new result\DataBaseResult(false, null, new result\DataBaseResultArgs($qry, $this->connection, $result));
        }

        if ($result instanceof \mysqli_result) {
            $resultArray = $this->BuildArray($result, $resultType);
            $result->free();
            return new result\DataBaseResult(true, $resultArray, new result\DataBaseResultArgs($qry, $this->connection, $result));
        }

        if (is_bool($result)) {
            return new result\DataBaseResult($result, $result, new result\DataBaseResultArgs($qry, $this->connection, $result));
        }

        return new result\DataBaseResult(true, $result, new result\DataBaseResultArgs($qry, $this->connection, $result));
    }

    /**
     * 
     * @param \mysqli_result $result
     * @param type $resultType
     * @return array
     */
    private function BuildArray(\mysqli_result $result, $resultType) {
        $resultArray = array();

        while (($x = $result->fetch_array($resultType)) != null) {
            array_push($resultArray, $x);
        }
        return $resultArray;
    }

    /**
     * @param type string
     * @return result\DataBaseResult
     */
    public function Execute($qry) {
        $dbResult = $this->connection->query($qry);

        $dbResultProxy = new result\DataBaseResultProxy();
        $args = new result\DataBaseResultArgs($qry, $this->connection);

        $dbResultProxy
                ->Set(result\DataBaseResultProxy::propertySuccess, false)
                ->Set(result\DataBaseResultProxy::propertyResult, null)
                ->Set(result\DataBaseResultProxy::propertyArgs, $args);

        if (is_bool($dbResult) && $dbResult === true) {
            $dbResultProxy->Set(result\DataBaseResultProxy::propertySuccess, true);
        } else if (is_object($dbResult)) {

            $dbResultProxy->Set(result\DataBaseResultProxy::propertySuccess, true);
            if ($dbResult instanceof \mysqli_result) {
                $args->SetAffectedRows($dbResult);
                $dbResultProxy->Set(result\DataBaseResultProxy::propertyArgs, $args);
            }
        }

        return $dbResultProxy->getDBResult();
    }

}

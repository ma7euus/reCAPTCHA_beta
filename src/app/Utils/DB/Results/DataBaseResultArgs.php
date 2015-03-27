<?php

namespace app\Utils\DB\Results;

final class DataBaseResultArgs {

    private $qry;
    private $connection;
    public $affectedRows;
    private $insert_id = null;

    public function __construct($qry, \mysqli $conn) {
        $this->qry = $qry;
        $this->connection = $conn;
        $this->affectedRows = 0;
    }

    public function getQuery() {
        return $this->qry;
    }

    public function getServerError() {
        return $this->connection->error;
    }

    public function getErrorCode() {
        return $this->connection->errno;
    }

    public function getInsertID() {
        if ($this->connection->insert_id === 0 && $this->insert_id != null)
            return $this->insert_id;
        return $this->connection->insert_id;
    }

    public function setInsertID($id) {
        $this->insert_id = $id;
    }

    public function nextResult() {
        $this->connection->next_result();
    }

    public function SetAffectedRows(\mysqli_result $result) {
        if (isset($result)) {
            $this->numRows = $result->num_rows;
        }
    }

}
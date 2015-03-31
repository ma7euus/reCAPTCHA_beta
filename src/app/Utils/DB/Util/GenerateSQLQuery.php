<?php

namespace app\Utils\DB\Util;

final class GenerateSQLQuery {

    /**
     * 
     * @param type $table
     * @param type $record
     * @return string
     */
    public function insertQuery($table, $record) {

        $sql = "INSERT INTO `$table` ( `";

        foreach ($record as $key => $val) {
            if (!\app\Utils\Functions::StringStartsWith($key, '_'))
                $sql .= $key . "`,`";
        }

        $sql = substr($sql, 0, -2);
        $sql .= ") VALUES ( ";

        foreach ($record as $key => $val) {
            if (!\app\Utils\Functions::StringStartsWith($key, '_'))
                $sql .= $this->QuoteSmart($val) . ",";
        }

        $sql = substr($sql, 0, -1) . ")";
        return $sql;
    }

    /**
     * 
     * @param type $table
     * @param type $record
     * @param type $criterio
     * @return type
     */
    public function updateQuery($table, $record, $criterio) {
        $sql = "UPDATE `$table` SET ";

        foreach ($record as $key => $val) {
            if (!\app\Utils\Functions::StringStartsWith($key, '_'))
                $sql .= "`$key` = " . $this->quote_smart($val) . ", ";
        }

        $sql = substr($sql, 0, -2) . ' ';
        $sql .= $this->whereClause($criterio);

        return $sql;
    }

    /**
     * 
     * @param type $value
     * @return type
     */
    public function QuoteSmart($value) {
        $value = "'" . utf8_decode(str_replace('\'', "", $value)) . "'";
        return utf8_encode($value);
    }

    /**
     * 
     * @param type $keys
     * @return type
     */
    public function whereClause($keys) {
        $rslt = " where ";
        foreach ($keys as $key => $val) {
            $rslt .= " (`$key` = " . $this->quote_smart($val) . ") and ";
        }
        $rslt = substr($rslt, 0, -4);
        return $rslt;
    }

}

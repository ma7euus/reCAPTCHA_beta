<?php

namespace app\Utils\DB;

final class DBManager {

    const DB_NAME = "MySQL";

    /**
     * 
     * @param int $_id
     * @param string $_table
     * @param \app\Models\EntityModels\EntityModel $_obj
     * @return int
     */
    public static function Gravar($_id, $_table, \app\Models\EntityModels\EntityModel $_obj) {
        $qry = "";

        $generateSQL = new Util\GenerateSQLQuery();

        if ($_id == 0) {
            $qry = $generateSQL->insertQuery($_table, $_obj);
        } else {
            $qry = $generateSQL->updateQuery($_table, $_obj, array("id" => $_id));
        }
        
        if ($qry != "") {
            MySQL\MySQL::Instance()->connection->set_charset("utf8");
            $resultMySQL = MySQL\MySQL::Instance()->Execute($qry);
            if ($resultMySQL->isSuccess()) {
                if($_id == 0)
                    $_obj->id = $resultMySQL->getDetails()->getInsertID();
                return $_obj->id;
            } else {
                fb($resultMySQL->getDetails());
            }
        }
        return 0;
    }

}
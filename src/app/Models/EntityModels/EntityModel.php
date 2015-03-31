<?php

namespace app\Models\EntityModels;

abstract class EntityModel {

    protected $_primaryKey = '';
    protected $_tableName = '';
    protected $_tableNameAlias = '';
    protected static $_fields = array();

    public function __construct() {
        
    }

    public abstract function SetPrimaryKey(&$nomeDoCampoChave);

    public abstract function SetTableName(&$tableName, &$tableNameAlias);

    public abstract function SetDefaultValues();

    public function SetValues(array $a, $setPrimaryKey = true, $utf8Decode = true) {
        if ($a == null || count($a) == 0)
            return;

        $array = $a;
        if (is_array(current($a)))
            $array = $a[0];

        $keys = array_keys($array);
        foreach ($keys as $a) {
            if (!$setPrimaryKey)
                if ($a == $this->_primaryKey)
                    continue;

            if (property_exists(get_class($this), $a)) {
                if (!\app\Utils\Functions::StringStartsWith($a, '_')) {
                    if ($utf8Decode)
                        $this->$a = utf8_decode($array[$a]);
                    else
                        $this->$a = $array[$a];
                }
                else {
                    
                }
            }
        }
    }

    /**
     * @return EntityModel
     */
    public static function CreateFromArray(array $array) {
        if (count($array) == 0)
            return null;

        $class = get_called_class();
        $instance = new $class;

        $keys = array_keys($array);
        foreach ($keys as $a) {
            $instance->$a = $array[$a];
        }

        return $instance;
    }

}

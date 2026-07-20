<?php

class Db_query {
    public static function find_this_query($sql) {
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();

        while ($row = mysqli_fetch_array($result_set)) {
            $the_object_array[] = self::instantiation($row);
        }

        return $the_object_array;
    }


    public static function instantiation($record) {
        $calling_class = get_called_class();

        $object = new $calling_class;

        foreach ($record as $attribute => $value) {
            if($object->has_the_attribute($attribute)) {
                $object->$attribute = $value;
            }
        }

        return $object;
    }


    private function has_the_attribute($attribute) {
        $objectProperties = get_object_vars($this);

        return array_key_exists($attribute, $objectProperties);
    }


        public static function find_all() {
        return self::find_this_query("SELECT * FROM " . static::$db_table);
    }


    public static function find_by_id($id) {
        return self::find_this_query("SELECT * FROM " . static::$db_table . " WHERE id={$id} LIMIT 1");
    }

    
    protected function properties() {
        $properties = [];

        foreach (static::$db_table_fields as $db_field) {
            if (property_exists($this, $db_field)) {
                $properties[$db_field] = $this->$db_field;
            }
        }

        return $properties;
    }


    public function create() {
        global $database;

        $properties = $this->properties();

        $sql = "INSERT INTO " . static::$db_table . " (";
        $sql .= implode(", ", array_keys($properties));
        $sql .= ") VALUES ('";
        $sql .= implode("', '", array_values($properties));
        $sql .= "')";

        return $database->query($sql);
    }
}
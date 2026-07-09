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
}
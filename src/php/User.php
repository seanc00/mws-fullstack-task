<?php 

class User {
    public $id;
    public $username;
    public $password;
    public $name;
    public $profile_picture;


    public static function find_all_users() {
        return self::find_this_query("SELECT * FROM users");
    }


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


    public static function verify_user($username, $password) {
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM users WHERE username ='{$username}' AND password = '{$password}' LIMIT 1";

        $the_result_array = self::find_this_query($sql);

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }
}
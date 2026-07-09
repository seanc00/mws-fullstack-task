<?php 

class User extends Db_query {
    public $id;
    public $username;
    public $password;
    public $name;
    public $profile_picture;
    protected static $db_table = "users";


    public static function verify_user($username, $password) {
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM " . static::$db_table . " WHERE username ='{$username}' AND password = '{$password}' LIMIT 1";

        $the_result_array = self::find_this_query($sql);

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }
}
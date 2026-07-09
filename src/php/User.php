<?php 

class User extends Db_query {
    public $id;
    public $username;
    public $password;
    public $name;
    public $profile_picture;


    public static function find_all_users() {
        return self::find_this_query("SELECT * FROM users");
    }


    public static function find_user_by_id($id) {
        return self::find_this_query("SELECT * FROM users WHERE id={$id} LIMIT 1");
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
<?php
require_once __DIR__ . "/src/php/Db_query.php";
require_once __DIR__ . "/src/php/Database.php";
require_once __DIR__ . "/src/php/Session.php";
require_once __DIR__ . "/src/php/User.php";

function redirect($location) {
    header("Location: {$location}");
}
?>
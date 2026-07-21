<?php
require_once "../../functions.php";

function add_log_to_history($value, $value_2) {
    $log = new History();
    $log->date = date("d/m/Y");
    $log->user_id = $_SESSION['user_id'];
    $log->action = "Downloaded file";
    $log->filename = $value;
    $log->name_of_file = $value_2;
    $log->create();
}

$file = Upload::find_by_id($_GET['id']);
$filename = $file[0]->filename;
$name_of_file = $file[0]->name_of_file;

if ($file && $filename) {
    add_log_to_history($filename, $name_of_file);
    redirect("/");
}
<?php
require_once "../../functions.php";

function add_log_to_history($value) {
    $log = new History();
    $log->date = date("d/m/Y");
    $log->user_id = $_SESSION['user_id'];
    $log->action = "Downloaded file";
    $log->filename = $value;
    $log->type = $value;
    $log->create();
}

$file = Upload::find_by_id($_GET['id']);
$filename = $file[0]->filename;

if ($file && $filename) {
    add_log_to_history($filename);
    redirect("/");
}
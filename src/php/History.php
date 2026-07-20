<?php

class History extends Db_query {
    protected static $db_table = "history";

    public $id;
    public $date;
    public $user_id;
    public $action;
    public $filename;
    public $type;

    protected static $db_table_fields = [
        "date",
        "user_id",
        "action",
        "filename",
        "type"
    ];
}
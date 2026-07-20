<?php

class Upload extends Db_query {
    protected static $db_table = "files";

    public $id;
    public $name_of_file;
    public $upload_date;
    public $user_id;
    public $file_path;
    public $filename;
    public $type;

    protected static $db_table_fields = [
        "name_of_file",
        "filename",
        "file_path",
        "user_id",
        "upload_date",
        "type"
    ];
}
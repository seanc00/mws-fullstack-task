<?php

class Upload extends Db_query {
    protected static $db_table = "files";

    public $id;
    public $name_of_file;
    public $upload_date;
    public $user_id;
    public $file_path;
    public $filename;
}
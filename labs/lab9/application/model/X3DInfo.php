<?php
include './application/model/BaseDAO.php';

class X3DInfo extends BaseDAO {
    public static $primary_key = 0;

    public static $columns = [
        'id' => 'INTEGER',
        'path' => 'TEXT',
    ]

    public $id;
    public $path;
}
?>
<?php
class X3DInfo extends BaseDAO {
    public static $primary_key = 0;

    public static $columns = [
        'id' => 'INTEGER',
        'brand_id' => 'INTEGER',
        'path' => 'TEXT',
    ];

    public static $tableName = 'x3d';

    public $id;
    public $brand_id;
    public $path;
}
?>
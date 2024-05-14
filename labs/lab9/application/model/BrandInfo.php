<?php
class BrandInfo extends BaseDAO {
    public static $primary_key = 0;

    public static $columns = [
        'id' => 'INTEGER',
        'name' => 'TEXT',
    ];

    public static $tableName = 'brand';

    public $id;
    public $name;
}
?>
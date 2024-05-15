<?php
class BrandInfo extends BaseDAO {
    public static $primary_key = 0;

    public static $columns = [
        'id' => 'INTEGER',
        'name' => 'TEXT',
    ];

    public $id;
    public $name;
}
?>
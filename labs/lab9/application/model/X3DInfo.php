<?php
class X3DInfo extends BaseDAO {
    public static $primary_key = 0;

    public static $columns = [
        'id' => 'INTEGER',
        'brand_id' => 'INTEGER',
        'path' => 'TEXT',
        'title' => 'TEXT',
        'description' => 'TEXT',
        'viewpoints' => 'TEXT',
    ];

    public $id;
    public $brand_id;
    public $path;
    public $title;
    public $description;
    public $viewpoints;
}
?>
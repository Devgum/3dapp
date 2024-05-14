<?php
class Card extends BaseDAO {
    public static $primary_key = 0;

    public static $columns = [
        'id' => 'INTEGER',
        'brand_id' => 'INTEGER',
        'title' => 'TEXT',
        'subtitle' => 'TEXT',
        'description' => 'TEXT',
    ];

    public static $tableName = 'Card';

    public $id;
    public $brand_id;
    public $title;
    public $subtitle;
    public $description;
}
?>
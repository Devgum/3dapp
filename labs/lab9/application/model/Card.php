<?php
class Card extends BaseDAO {
    public static $primary_key = 0;

    public static $columns = [
        'id' => 'INTEGER',
        'brand_id' => 'INTEGER',
        'page_no' => 'INTEGER',
        'title' => 'TEXT',
        'subtitle' => 'TEXT',
        'description' => 'TEXT',
        'image_path' => 'TEXT',
        'link' => 'TEXT',
    ];

    public $id;
    public $brand_id;
    public $page_no;
    public $title;
    public $subtitle;
    public $description;
    public $image_path;
    public $link;
}
?>
<?php
class Image extends BaseDAO {
    public static $primary_key = 0;

    public static $columns = [
        'id' => 'INTEGER',
        'brand_id' => 'INTEGER',
        'gallery_path' => 'TEXT',
        'render_path' => 'TEXT',
    ];

    public $id;
    public $brand_id;
    public $gallery_path;
    public $render_path;
}
?>
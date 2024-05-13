<?php
include './application/model/BaseDAO.php';

class Image extends BaseDAO {
    public static $primary_key = 0;

    public static $columns = [
        'id' => 'INTEGER',
        'gallery_path' => 'TEXT',
        'render_path' => 'TEXT',
    ]

    public $id;
    public $gallery_path;
    public $render_path;
}
?>
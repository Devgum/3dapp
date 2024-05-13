<?php
include './application/model/BaseDAO.php';

class BrandInfo extends BaseDAO {
    public static $primary_key = 0;

    public static $columns = [
        'id' => 'INTEGER',
        'name' => 'TEXT',
        'x3d_id' => 'INTEGER',
        'text_id' => 'INTEGER',
        'image_id' => 'INTEGER'
    ]

    public $id;
    public $name;
    public $x3d_id;
    public $text_id;
    public $image_id;
}
?>
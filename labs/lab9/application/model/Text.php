<?php
class Text extends BaseDAO {
    public static $primary_key = 0;

    public static $columns = [
        'id' => 'INTEGER',
        'model_title' => 'TEXT',
        'model_subtitle' => 'TEXT',
        'model_description' => 'TEXT',
    ];

    public $id;
    public $model_title;
    public $model_subtitle;
    public $model_description;
}
?>
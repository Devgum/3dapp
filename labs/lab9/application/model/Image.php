<?php
class Image {
    public static $primary_key = 0;

    public static $tpyes = [
        "INTEGER",
        "TEXT",
        "TEXT",
    ]

    public $id;
    public $gallery_path;
    public $render_path;
}
?>
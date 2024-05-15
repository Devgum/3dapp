<?php
$currentBrandId = isset($_GET['brand_id']) ? $_GET['brand_id'] : 1;
$gallery_directory = './assets/gallery/';
foreach ($brands as $brand) {
    if ($brand->id == $currentBrandId) {
        $gallery_directory .= $brand->name;
    }
}
$allowed_extensions = array('jpg', 'jpeg', 'gif', 'png');
$images = [];
$i = 0;
$dir_handle = opendir($gallery_directory);
while ($file = readdir($dir_handle)) {
    if (substr($file, 0, 1) != '.') {
        $file_components = explode('.', $file);
        $extension = strtolower(array_pop($file_components));
        if (in_array($extension, $allowed_extensions)) {
            $images[$i] = $gallery_directory.'/'.$file;
            $i++;
        }
    }
}
closedir($dir_handle);
?>
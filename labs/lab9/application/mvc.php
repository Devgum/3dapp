<?php
require 'view/load.php';
require 'model/model.php';
require 'controller/controller.php';
$pageURI = $_SERVER['REQUEST_URI'];
$queryStringStart = strpos($pageURI, '?');
if ($queryStringStart !== false) {
    $pageURI = substr($pageURI, 0, $queryStringStart);
}
$pageMethod = basename($pageURI);

if (empty($pageMethod))
    new Controller('home');
else
    new Controller($pageMethod);
?>
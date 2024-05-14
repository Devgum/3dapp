<?php
include './application/model/model.php';
$m = new Model();
$card_array = $m->getMainCard();
foreach ($card_array as $key => $value) {
    echo "$key: $value<br>";
}
?>
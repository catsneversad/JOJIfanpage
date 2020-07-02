<?php

$string = file_get_contents ("data.json");
$array = json_decode ($string);
$last_id = sizeof ($array) + 1;

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $class = $_POST['class'];
    $price = $_POST['price'];
    $URL = $_POST['URL'];

    $image = imagecreatefromjpeg ($URL);
    imagejpeg($image, '../img/'.$last_id.'_small.jfif');

    $cur = [
        'id' => $last_id,
        'name' => $name,
        'price' => $price, 
        'url' => "img/".$last_id.'_small.jfif'
    ];
    array_push ($array, $cur);
    $json = json_encode($array);
    file_put_contents ("data.json", $json);
    header("Location: ../index.php");
} else {
    header("Location: ../index.php");
}
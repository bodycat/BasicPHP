<?php
require_once "../config/main.php";
require_once ENGINE_DIR . "db.php";

function displayGallery()
{
    $dir = PUBLIC_DIR . "images/small/";
    $products = queryAll("SELECT * FROM product");
    foreach ($products as $info) {
        if (file_exists($dir . $info['path'])) {
            /*Вывод фото*/
            echo "<center><a href='view.php?id={$info["id"]}'>
            <img src = '{$dir}{$info["image"]}' title='Подробнее'><br>{$info["name"]}</center></a><hr>";
        }
    }
}
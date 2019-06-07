<?php 
// http://phpfaq.ru/pdo/fetch
// https://php.net/manual/en/pdo.constants.php

// отсюда делаем запрос в базу, 
// из базы вытаскиваем данные
// User Id=root;Host=localhost;Character Set=utf8
$pdo = new PDO('mysql:host=localhost; dbname=app; charset=utf8', 'root', '');

// проверка базы 1
// var_dump($pdo)
// object(PDO)#1 (0) { } 
// при правильном подключении

$statement = $pdo->query('SELECT * FROM products');
$statement->execute();

// проверка базы 2
// var_dump($statement)
// object(PDOStatement)#2 (1) { ["queryString"]=> string(22) "SELECT * FROM products" }
// проверка базы 3
// var_dump($statement->fetchall());
// array(2) { [0]=> array(14) { ["id"]=> string(1) "1" [0]=> string(1) "1" ["title"]=> string(8) "Iphone 6" [1]=> string(8) "Iphone 6" ["price"]=> string(6) "300.00" [2]=> string(6) "300.00" ["quantity"]=> string(1) "3" [3]=> string(1) "3" ["imei"]=> NULL [4]=> NULL ["mac"]=> NULL [5]=> NULL ["sn"]=> NULL [6]=> NULL } [1]=> array(14) { ["id"]=> string(1) "2" [0]=> string(1) "2" ["title"]=> string(37) "Зарядное устройство" [1]=> string(37) "Зарядное устройство" ["price"]=> string(5) "10.00" [2]=> string(5) "10.00" ["quantity"]=> string(2) "10" [3]=> string(2) "10" ["imei"]=> NULL [4]=> NULL ["mac"]=> NULL [5]=> NULL ["sn"]=> NULL [6]=> NULL } }
// проверка базы 4
// var_dump($statement->fetchall(2));
// array(2) { [0]=> array(7) { ["id"]=> string(1) "1" ["title"]=> string(8) "Iphone 6" ["price"]=> string(6) "300.00" ["quantity"]=> string(1) "3" ["imei"]=> NULL ["mac"]=> NULL ["sn"]=> NULL } [1]=> array(7) { ["id"]=> string(1) "2" ["title"]=> string(37) "Зарядное устройство" ["price"]=> string(5) "10.00" ["quantity"]=> string(2) "10" ["imei"]=> NULL ["mac"]=> NULL ["sn"]=> NULL } }
// проверка базы 5
// var_dump($statement->fetchall(5));
// array(2) { [0]=> object(stdClass)#3 (7) { ["id"]=> string(1) "1" ["title"]=> string(8) "Iphone 6" ["price"]=> string(6) "300.00" ["quantity"]=> string(1) "3" ["imei"]=> NULL ["mac"]=> NULL ["sn"]=> NULL } [1]=> object(stdClass)#4 (7) { ["id"]=> string(1) "2" ["title"]=> string(37) "Зарядное устройство" ["price"]=> string(5) "10.00" ["quantity"]=> string(2) "10" ["imei"]=> NULL ["mac"]=> NULL ["sn"]=> NULL } }
//---
// var_dump($statement->fetchall());
// var_dump($statement->fetchall(2));
// echo json_encode($statement->fetchAll(2));
// [{"id":"1","title":"Iphone 6","price":"300.00","quantity":"3","imei":null,"mac":null,"sn":null},{"id":"2","title":"\u0417\u0430\u0440\u044f\u0434\u043d\u043e\u0435 \u0443\u0441\u0442\u0440\u043e\u0439\u0441\u0442\u0432\u043e","price":"10.00","quantity":"10","imei":null,"mac":null,"sn":null}]
//---
// echo json_encode($statement->fetchAll(2));
// или запись вида
echo json_encode($statement->fetchAll(PDO::FETCH_ASSOC));
 ?>
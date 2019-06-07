<?php 
// var_dump($_POST);
$product = $_POST['product'];
$pdo = new PDO('mysql:host=localhost; dbname=app; charset=utf8', 'root','');
// вставим данные в безопасном формате
$statement = $pdo->prepare('DELETE FROM  products WHERE id=:id');
$statement->execute(
	[
		':id' => $_POST['product_id'],
	]
);
//;drop table products;
// var_dump($_POST['product']['quantity']);
 ?>
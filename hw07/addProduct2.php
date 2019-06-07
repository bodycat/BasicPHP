<?php 
// https://habr.com/ru/post/137664/
    $host = 'localhost';
    $db   = 'app';
    $user = 'root';
    $pass = '';
    $charset = 'utf8';
// $pdo = new PDO('mysql:host=localhost; dbname=app; charset=utf8', 'root','');

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
$pdo = new PDO($dsn, $user, $pass, $opt);
// http://phpfaq.ru/pdo
// использовать try..catch нужно только тогда, когда вы собираетесь ОБРАБОТАТЬ ошибку - то есть, совершить какое-то действие, связанное с ФАКТОМ ошибки - откатить транзакцию, например

// try {
//     $dbh = new PDO($dsn, $user, $password);
// } catch (PDOException $e) {
//     die('Подключение не удалось: ' . $e->getMessage());
// }

// $stmt = $pdo->query('SELECT name FROM users');
// while ($row = $stmt->fetch())
// {
//     echo $row['name'] . "\n";
// }

// подготовка 
// $stmt = $pdo->prepare('SELECT name FROM users WHERE email = ?');
// $stmt->execute(array($email));

// https://php.net/manual/en/pdostatement.bindvalue.php#example-986

// $stmt = $pdo->prepare('SELECT name FROM users WHERE email = ?');
// $stmt->execute([$_GET['email']]);
// foreach ($stmt as $row)
// {
//     echo $row['name'] . "\n";
// }

// $data = array(
// 1 => 1000,
// 5 => 300,
// 9 => 200,
// );

// $stmt = $pdo->prepare('UPDATE users SET bonus = bonus + ? WHERE id = ?');
// foreach ($data as $id => $bonus)
// {
//     $stmt->execute([$bonus,$id]);
// }

// ошибки
// https://phpdelusions.net/articles/error_reporting#tldr



$product = $_POST['product'];
$pdo = new PDO('mysql:host=localhost; dbname=app; charset=utf8', 'root','');
$pdo->prepare('INSERT INTO products (title, price, quantity) VALUES (:title, :price, :quantity)');
$statement->execute([
		':title' => $product['title'],
		':price' => $product['price'],
		':quantity' => $product['quantity']
]);
?>



    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);

<!-- 
// var_dump($_POST);
// var_dump($_POST['id']['product']['quantity']['price']);

$product = $_POST['product'];
$pdo = new PDO('mysql:host=localhost; dbname=app; charset=utf8', 'root','');
// // вставим данные в безопасном формате
$pdo->prepare('INSERT INTO products (title, price, quantity) VALUES (:title, :price, :quantity)');
// $pdo->prepare('INSERT INTO products (title, price, quantity, imei, mac, sn) VALUES (:title, :price, :quantity, :imei, :mac, :sn)');

$STH = $DBH->prepare("INSERT INTO folks ( first_name ) values ( 'Cathy' )");  
$STH->execute();

$statement->execute([
		':title' => $product['title'],
		':price' => $product['price'],
		':quantity' => $product['quantity']
]);

// $statement->execute([
// 		':title' => $product['title'],
// 		':price' => $product['price'],
// 		':quantity' => $product['quantity'],
// 		':imei' => $product['imei'],
// 		':mac' => $product['mac'],
// 		':sn' => $product['sn']
// ]);

//;drop table products;
// var_dump($_POST['product']['quantity']); -->
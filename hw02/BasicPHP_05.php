<?php
$h3 = "PHP 7.2.0 Release Candidate 2 Released";
$text = "The PHP development team announces the immediate availability of PHP 7.2.0 RC2. This release is the second Release Candidate for 7.2.0.";
$title = "PHP: Hypertext Preprocessor";
$year = date('Y'); // https://php.ru/manual/function.date.html
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css' rel='stylesheet'
          type='text/css'>
</head>
<body>
<pre>
    Посмотреть на встроенные функции PHP. 
    Используя имеющийся HTML-шаблон, 
    вывести текущий год в подвале при помощи встроенных функций PHP.
</pre>
<!-- онлайн проверка кода -->
<!-- https://www.onlinegdb.com/online_php_interpreter -->
<!-- https://www.jdoodle.com/php-online-editor -->
<div class="row column">
    <hr>
    <ul class="menu">
        <li>SHOP</li>
        <li><a href="#">Главная</a></li>
        <li><a href="#">О нас</a></li>
        <li><a href="#">Контакты</a></li>
        <li class="float-right" style="margin-top:-32px;">Copyright &copy; <?= $year ?></li>
    </ul>
</div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>

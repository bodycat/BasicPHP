<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>GeekBrains BasicPHP Hw05</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- <link href="./css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="./css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="page-header">
        <h1>GeekBrains BasicPHP Hw05</h1>
    </div>
    <hr>
    <pre>
 1. Создать галерею изображений, состоящую из двух страниц:
    просмотр всех фотографий (уменьшенных копий);
    просмотр конкретной фотографии (изображение оригинального размера) по ее ID в базе данных.
2. В базе данных создать таблицу, в которой будет храниться информация о картинках (адрес на сервере, размер, имя).
3. *На странице просмотра фотографии полного размера под картинкой должно быть указано число ее просмотров.
4. *На странице просмотра галереи список фотографий должен быть отсортирован по популярности. Популярность = число кликов по фотографии.
    </pre>

    <?php

    /*Файлы конфигурации*/
    require_once "../config/main.php";
    $config = include CONFIG_DIR . "db.php";

    /*Библиотека - Генерация thumbnails*/
    require_once VENDOR_DIR . "funcImgResize.php";

    /*Подключение к БД*/
    $conDB = mysqli_connect($config["host"], $config["user"], $config["password"], $config["db"]);

    include ENGINE_DIR . "render.php";
    include ENGINE_DIR . "uploads.php";
    include ENGINE_DIR . "counters.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_FILES)) {
        uploads($conDB);
    }

    renderGal($conDB, null);

    /*Закрытие соединения с БД*/
    mysqli_close($conDB);

    ?>
    <div class="page-header">
        <h3>Загрузка нового изображения</h3>
    </div>

    <form action="" enctype="multipart/form-data" method="post">
        <input type="file" name="file"/>
        <input type="submit" value="Загрузить"/>
    </form>
    
    <pre>
        


    </pre>
</div>
<script src="./js/jquery-1.11.2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>
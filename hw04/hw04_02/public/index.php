<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>GeekBrains BasicPHP Hw04_01</title>
    <!--        Компоненты форм на сайте        -->
    <!-- http://getbootstrap.ru/docs/v4-alpha/components/forms/ -->
    <!-- <link href="./css/bootstrap.min.css" rel="stylesheet"> -->    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- <link href="./css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="./css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">

    <div class="pageGal">
        <h1>GeekBrains BasicPHP Hw04_02</h1>
    </div>
    <pre>
2. *Строить фотогалерею, не указывая статичные ссылки к файлам, 
а просто передавая в функцию построения адрес папки с изображениями. 
Функция сама должна считать список файлов и построить фотогалерею со ссылками в ней.
    </pre>

    <?php

    /*Файл конфигурации*/
    include "../config/main.php";

    /*Генерация thumbnails*/
    include "funcImgResize.php";

    function downloads()
    {
        foreach ($_FILES as $file) {
            $fileType = explode("/", $file['type'])[0];
            if ($file['error'] != 0) {
                $message = "Произошла ошибка: " . $file['error'] . "!";
            } elseif ($fileType != "image") {
                $message = "Неверный тип файла: " . $file['name'] . "!";
            } elseif ($file['size'] > 1048576) {
                $message = "Слишком большой размер файла: " . $file['size'] . "! Не более 1Мб!";
            } else {
                $src = $file['tmp_name'];
                $original = IMAGES_DIR . $file['name'];
                $thumbs = IMAGES_THUMBS_DIR . $file['name'];
                img_resize($src, $thumbs, 240, 160);
                move_uploaded_file($src, $original);
                $message = "Загрузка файла: " . $file['name'] . " успешно выполнена!";
            }

            echo '<div class="page-header"><h4>' . $message . '</h4></div>';
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_FILES)) {
        downloads();
    }

    function scanDirectory()
    {
        $dir = opendir(IMAGES_THUMBS_DIR);
        while ($filename = readdir($dir)) {
            if (!is_dir($filename)) {
                $fileType = explode("/", mime_content_type(IMAGES_THUMBS_DIR . $filename))[0];
                if ($fileType == "image") {
                    $files[] = $filename;
                }
            }
        }
        closedir($dir);
        return $files;
    }


    function renderGal()
    {
        echo '<div class="page-header">';
        echo '<h3>Содержимое каталога: "' . IMAGES_DIR . '"</h3>';
        echo '</div>';
        echo '<div class="row">';

        $files = scanDirectory();
        if(count($files) > 0) {
            foreach ($files as $fileName) {
                $fileOriginal = IMAGES_DIR . $fileName;
                $fileThumb = IMAGES_THUMBS_DIR . $fileName;
                // echo '<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 thumb">';
                echo '<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 thumb">';
                echo '<a href="' . $fileOriginal . '" target="_blank">';
                // echo '<img class="img-responsive" src="' . $fileThumb . '"/></a></div>';
                echo '<img src="' . $fileThumb . '" class="img-fluid">';
                echo '</a></div>';
            }
        } else {
            echo '<div class="page-header"><h4>Каталог пуст</h4></div>';
        }
        echo '</div>';
    }

    renderGal();

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>
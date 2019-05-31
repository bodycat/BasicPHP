<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>GeekBrains BasicPHP Hw04_01</title>
    <!--        Компоненты форм на сайте        -->
    <!-- http://getbootstrap.ru/docs/v4-alpha/components/forms/ -->
    <!-- <link href="./css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- https://www.bootstrapcdn.com/ -->

    <link href="./css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="pageGal">
        <h1>GeekBrains BasicPHP Hw04_01</h1>
    </div>

<pre>
1. Создать галерею фотографий. 
Она должна состоять всего из одной странички, 
на которой пользователь видит все картинки в уменьшенном виде 
и форму для загрузки нового изображения. 
При клике на фотографию она должна открыться в браузере в новой вкладке. 
Размер картинок можно ограничивать с помощью свойства width. 
При загрузке изображения необходимо делать проверку на тип и размер файла.
</pre>
    <?php

    /*Файл конфигурации*/
    include "../config/main.php";

    function downloads()
    {
        foreach ($_FILES as $file) {
            $fileType = explode("/", $file['type'])[0];
            if ($file['error'] != 0) {
                $message = "Ошибка: " . $file['error'] . "!";
            } elseif ($fileType != "image") {
                $message = "Неверное расширение файла: " . $file['name'] . "!";
            } elseif ($file['size'] > 2097152) {
                $message = "Файл слишком большой: " . $file['size'] . "! Ограничение 2 mb";
            } else {
                move_uploaded_file($file['tmp_name'], IMAGES_DIR . $file['name']);
                $message = "Загрузка файла: " . $file['name'] . " завершена!";
            }

            echo '<div class="page-header"><h4>' . $message . '</h4></div>';
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_FILES)) {
        downloads();
    }
    function scanOfDir()
    {
        $dir = opendir(IMAGES_DIR);
        while ($filename = readdir($dir)) {
            if (!is_dir($filename)) {
                $fileType = explode("/", mime_content_type(IMAGES_DIR . $filename))[0];
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
        echo '<div class="containerGal" id="app">';
        echo '<h4>Каталог: "' . IMAGES_DIR . '"</h4>';
        echo '</div>';

        echo '<div class="row">';
        echo '<table class="table">';

        $files = scanOfDir();
        if(count($files) > 0) {
            foreach ($files as $fileName) {
                $fileNameFull = IMAGES_DIR . $fileName;
                echo '<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 thumb">';
                echo '<a href="' . $fileNameFull . '" target="_blank">';
                // echo '<img class="img-responsive" src="' . $fileNameFull . '"/></a></div>';
                echo '<img src="' . $fileNameFull . '" class="img-fluid">';
        // echo 'class="img-fluid" <img src="" . $fileNameFull . '"/></a></div> >';
                echo '</a></div>';

            }
        } else {
            echo '<div class="pageGal"><h4>Каталог пуст</h4></div>';
        }
        echo '</div>';
        echo '</table>';
    }
    // <!-- Bootstrap 3 -->  
    // <img src="..." class="img-responsive">
 
    // <!-- Bootstrap 4 -->  
    // <img src="..." class="img-fluid">    
    renderGal();
    ?>

    <div class="pageGal">
        <h4>Загрузка нового изображения  </h4>
        <form action="" enctype="multipart/form-data" method="post">
        <input type="file" name="file"/>
        <input type="submit" value="Загрузить"/>
    </form>
    </div>
</div>
<div>
    <pre>
        


    </pre>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>
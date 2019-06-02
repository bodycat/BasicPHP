<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<?php
require_once "../config/main.php";
require_once ENGINE_DIR . "upload.php";
require_once ENGINE_DIR . "auth.php";
require_once ENGINE_DIR . "category.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['password'];
}
    echo '<div class="container"></div>';
        echo '<div class="row"></div>';
        echo '<a class="btn btn-primary" href="index.php" role="button">Главное меню</a>';
        // echo '<a href="index.php">Главное меню</a><br>';
            echo '<hr>';
            echo "<center><h2>Панель администратора</h2>";
             echo '<div class="col-sm">';
             echo '</div>';

             echo '<div class="col-sm">';
                
            if (authentication($login, $password)) {
                uploadImg();
                /*<Форма загрузки нового товара>*/
                echo '<hr>';
                echo '<b>Добавить продукт:</b><hr>
                    <form action="" enctype="multipart/form-data" method = "post">
                        Наименование: <input name="name" type="text"/><hr>
                        Краткое описание: <textarea name="short_description" cols="30" rows="5"></textarea><hr> 
                        Описание: <textarea name="description" cols="30" rows="10"></textarea><hr>
                        Цена: <input name="price" type="text"/><hr>
                        Категория:' . selectCategory() . '<hr>
                        Изображение: <input name="file" type="file"/><hr>
                        <input name="login" type="hidden" value="' . $login . '"/>
                        <input name="password" type="hidden" value="' . $password . '"/>
                        <input value="Сохранить" type="submit"/>
                    </form>';
            } else {
                /*<Форма аутентификации*/
                    echo "Введите логин и пароль для входа в панель администратора (root, qwerty)";
                    echo '<hr>';
                    echo '<form action="" method = "post">
                    Логин: <input name="login" type="text"/>
                    <hr>
                    Пароль: <input name="password" type="password"/>
                    <hr>
                    <input value="Войти" type="submit"/>
                    </form>';
            }
            echo '</div>';
        echo '</div>';
    echo '</div>';
closeConnection();

?>
<pre>



    <!-- footer + css -->
<!-- 
html {
  position: relative;
  min-height: 100%;
}
body {
  /* Margin bottom by footer height */
  margin-bottom: 60px;
}
#footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  /* Set the fixed height of the footer here */
  height: 60px;
  background-color: #f5f5f5;
} -->
</pre>
</center>
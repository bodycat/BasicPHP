<?php
require_once "../config/main.php";
require_once ENGINE_DIR . "render.php";

/*
 * 4. Создать страницу каталога товаров:
 * - товары хранятся в БД (структура прилагается);
 * - страница формируется автоматически;
 * - по клику на товар открывается карточка товара с подробным описанием.
 * - подумать, как лучше всего хранить изображения товаров.
 *
 * 5. (*) Написать CRUD-блок для управления выбранным модулем через единую функцию (doFeedbackAction()).
 */

displayGallery();
closeConnection();
?>

<center>
<a href="admin.php">Панель администратора</a>
</center>
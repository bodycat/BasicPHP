# GeekBrains. PHP. Уровень 1.

Преподаватель: Анатолий Костыренко

## Урок 7. Авторизация и аутентификация

1. Создать модуль корзины. В нее можно добавлять товары, а можно удалять. +

| Запрос | Данные запроса | Данные ОК ответа | Данные ответа с ошибкой | Данные ОК ответа JSON | Данные ответа JSON с ошибкой | Комментарий |
|--------------------------|--------------------------------------|------------------|-------------------------|-----------------------|-----------------------------------------------------|---------------------------------------------------------------------------------------|
| Добавить товар в корзину | {"id_product" : 123, "quantity" : 1} | (string) 1 | (string) 0 | { result: 1 } | { result: 0, errorMessage : "Сообщение об ошибке" } | Подразумевается, что целевая корзина пользователя идентифицируется на стороне сервера |
| Удалить товар из корзины | {"id_product" : 123} | (string) 1 | (string) 0 | { result: 1 } | { result: 0, errorMessage : "Сообщение об ошибке" } | |
Использовать сущность good в качестве товара.
2. Создать модуль личного кабинета, на который будет перенаправляться пользователь после логина. Вывести там имя, логин и приветствие.
3. *Создать модуль регистрации пользователя (см. ссылку в доп. материалах).


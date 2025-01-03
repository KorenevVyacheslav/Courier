## <p align='center'>Web - приложение</p>

## <p align='center'>Расписание поездок курьеров в регионы</p>

Формулировка задания:
<p> Из Москвы в регионы отправляются с центрального склада курьеры с товаром. Время в пути известно. Количество поездок в регион не ограничено. 
</p>

<p>Вывести расписание поездок в регионы за выбранную дату в календаре. </p>

1. Рабочая форма для внесения данных в расписание с полями: 
    + Регион
    + Дата выезда из Москвы
    + ФИО курьера 
2. Длительность поездки (туда/обратно) задается в таблице БД регионов.
3. Отдельным скриптом на PHP заполняются данные по поездкам за три месяца.

#### Дополнительно
+ Веб-сервер: Nginx
+ БД: MySQL 
+ Фронт: Ajax-запросы 
+ Передача и приём сообщений происходит посредством AJAX-запросов.
+ Мессенджер работает без использования "Сookie".

![alt text](./pictures/printscreen.png)

## Используемые технологии

* Composer

* PHP 8.1

* JS

* Bootstrap 5


## Как открыть/запустить

Клонировать https://github.com/KorenevVyacheslav/Courier в  папку c вашими доменами. В файле config.php переопределить константы для подключения к вашей БД. В вашей СУБД запустить Mysql script. sql для создания таблиц. Выполнить команду "composer update" для загрузки папки 'vendor'. Запустить index.php. 
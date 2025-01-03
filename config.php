<?php

define('URL', __DIR__ . DIRECTORY_SEPARATOR); 
define ('APP', URL . 'app' . DIRECTORY_SEPARATOR);                 //    директория   /app/
define ('VIEWS', APP . 'views' . DIRECTORY_SEPARATOR);             //    директория   /app/views/
define ('CONTROLLERS', APP . 'controllers' . DIRECTORY_SEPARATOR); //    директория   /app/controllers/
define ('MODELS', APP . 'models' . DIRECTORY_SEPARATOR);           //    директория   /app/models/
define ('IMAGES', 'userpics' . DIRECTORY_SEPARATOR);                //   директория   /userpics/ 
define ('CONTROLLERS_NAMESPACE', 'App\\controllers\\' );

// define ('timezone', 'Asia/Yekaterinburg' );
date_default_timezone_set('Asia/Yekaterinburg');                // определить часовой пояс


// введите ваши нстройки БД:
define ('HOST', 'localhost');                                       // определить наименование хоста
define ('USER', 'homestead');                                       // определить имя пользователя БД
define ('PASSWORD', 'secret');                                      // определить пароль к БД
define ('DB_NAME', 'Schedule');                                    // определить наименование БД


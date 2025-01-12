<?php

define('URL', __DIR__ . DIRECTORY_SEPARATOR);                       //    директория   /home/slava/Projects/dom1/
define ('APP', URL . 'app' . DIRECTORY_SEPARATOR);                 //    директория   /home/slava/Projects/dom1/app/
define ('VIEWS', APP . 'views' . DIRECTORY_SEPARATOR);             //    директория   /app/views/
define ('CONTROLLERS', APP . 'controllers' . DIRECTORY_SEPARATOR); //    директория   /app/controllers/
define ('MODELS', APP . 'models' . DIRECTORY_SEPARATOR);           //    директория   /app/models/
define ('IMAGES', 'userpics' . DIRECTORY_SEPARATOR);                //   директория   /userpics/ 
define ('CONTROLLERS_NAMESPACE', 'app\\controllers\\' );

date_default_timezone_set('Asia/Yekaterinburg');                // определить часовой пояс


// введите ваши нстройки БД:
define ('HOST', 'localhost');                                       // определить наименование хоста
define ('USER', 'root');                                            // определить имя пользователя БД
define ('PASSWORD', 'root');                                        // определить пароль к БД
define ('DB_NAME', 'courier');                                      // определить наименование БД


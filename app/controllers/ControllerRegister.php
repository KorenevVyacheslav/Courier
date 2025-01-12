<?php
namespace App\controllers;
use App\core\Controller;
use App\core\View;
use App\models\DB;

//контроллер страницы записи курьера в БД
class ControllerRegister extends Controller	{
	function __construct()	{
		$this->view = new View();
	}
	
	function action_index()	{
		$data = [
			'errors' => [],							// массив ошибок
			'messages'=>[],							// массив сообщений
			'reg' => false,							// флаг успешной записи курьера
		];

		// обработка кнопки записи
		if (isset($_POST['action']) && isset ($_POST['name']) && isset ($_POST['surname']) && isset ($_POST['patronyc']))	{ 			
	
			$reg=true; 															// инициализация записи

			// проверка длины логина не более 20 символов (дублирует ограничение на уровне html)
			if (mb_strlen($_POST['name']) > 20 || mb_strlen($_POST['name']) < 5)	{
				$data['errors'] [] = "Логин должен быть не менее 5 и не больше 20 символов";	
				$reg=false;	
			} 
			
			if (mb_strlen($_POST['surname']) > 20 || mb_strlen($_POST['surname']) < 5)	{
				$data['errors'] [] = "Фамилия должна быть не менее 5 и не больше 20 символов";
				$reg=false;	
			} 

			if (mb_strlen($_POST['patronyc']) > 20 || mb_strlen($_POST['patronyc']) < 5)	{
				$data['errors'] [] = "Отчество должно быть не менее 5 и не больше 20 символов";
				$reg=false;	
			} 


			// проверки на существующего курьера нет по условию ТЗ

			// запись курьера в БД
			if ($reg==true) {

				$id = DB::save_courier ($_POST['name'], $_POST['surname'], $_POST['patronyc']);
				if ($id) {
					$data['reg']=true;
				}	else $data['errors'] [] = "Во время записи пользователя в БД произошла ошибка";
			}


		} 	//	if (isset($_POST['action'])...

		$this->view->generate('register_view.php', 'template_view.php', $data);
	}
}


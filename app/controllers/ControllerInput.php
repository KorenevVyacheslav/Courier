<?php
namespace App\controllers;
use App\core\Controller;
use App\core\View;
use App\models\DB;


//контроллер входной страницы
class ControllerInput extends Controller	{

	public function __construct()	{				
	 	$this->view = new View();					// инициализация объекта представления
	}

	function action_index()	{	

	   $data = [								
		'errors' => [],							// массив ошибокgit remote add githublinux https://github.com/KorenevVyacheslav/example
		'messages'=>[],							// массив сообщений
		'check' => true,						// флаг пустой таблицы заказов  
	];


		$check = DB::get_orders_table ();											// если нет ни одной записи, то надо вывести кнопку заполнения таблицы
		 		
		if (!$check) $data['check'] = false;										// таблица пустая, значит выводим кнопку заполнения

		$this->view->generate('input_view.php', 'template_view.php', $data);		// генерация изображения
	}
}


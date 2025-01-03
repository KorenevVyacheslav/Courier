<?php
namespace App\controllers;
use App\core\Controller;
use App\core\View;
use App\models\DB;


//контроллер входной страницы
class ControllerOrder extends Controller	{

	public function __construct()	{				
	 	$this->view = new View();					// инициализация объекта представления
	}

	function action_index()	{	

	   $data = [								
		'errors' => [],							// массив ошибок
		'messages'=>[],							// массив сообщений
		'reg' => false,							// флаг успешной записи заказа
		'towns' =>  DB::get_towns_table(),
		'couriers' =>  DB::get_courier_table(),
	];		

	if (isset($_POST['town_id']) && isset ($_POST['courier_id']) )	{ 

		// метод записи заказа	save_order($town_id, $courier_id, $date)
		$id = DB::save_order($_POST['town_id'], $_POST['courier_id'], $_POST['date']);
			if ($id) {
				$data['reg']=true;
			}	else $data['errors'] [] = "Во время записи заказа в БД произошла ошибка";
		
	}
	    
		$this->view->generate('register_order_view.php', 'template_view.php', $data);		// генерация изображения
	}
}


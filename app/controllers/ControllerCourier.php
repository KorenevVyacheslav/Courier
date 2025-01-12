<?php
namespace App\controllers;
use App\core\Controller;
use App\core\View;

// контроллер страницы собеседников (выбранных как друзья)
class ControllerCourier extends Controller {

	public function __construct()	{				
        $this->view = new View();					// инициализация объекта представления
   }

   function action_index()	{	

      $data = [								
       'errors' => [],							// массив ошибок
       'messages'=>[],							// массив сообщений
       'check' => true,						// флаг пустой таблицы заказов  
   ];		

       $this->view->generate('courier_view.php', 'template_view.php', $data);		// генерация изображения
   }


}



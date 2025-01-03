<?php
namespace App\controllers;
use App\core\Controller;
use App\core\View;
use App\models\DB;
use App\core\GetRandom;
use App\core\GetSumDays;


//  контроллер для заполнения таблицы заказов случайными записями
class ControllerFill extends Controller {

	public function __construct()	{				
	 	$this->view = new View();						// инициализация объекта представления
	}

	function action_index()	{	
   		$data = [								
			'table_filled' => false						// переменная для отображения сообщения
		];

		$all_courier = DB::get_courier_table();													// получаем всех курьеров
		// проходим по каждому курьеру и генерируем для него записи случайным образом
		// но с условием, что на какую-либо дату курьер может быть только в одной поездке
		// можно заполнять по количеству записей, а можно по суммарному количеству дней для одного курьера
		// в данном варианте по количеству дней 45 (половина от 3 месяцев)
		foreach ($all_courier as $courier) {	
			//$max_orders = 20; 														// максимальное число записей, которые будут внесены 
																						// раскомментировать, если заполнение будет по числу записей
			do {
				$random_town_id = GetRandom::get_random_town_id();										// получаем id случайного города
				$random_date = GetRandom::get_random_date();											// получаем сдучайную дату в диапазоне от текущей до + 3 месяца
				$orders = DB::find_courier_byId($courier['id']);										// получаем все записи по курьеру в таблице orders

				$record = true;																			// флаг разрешения записи

				// проходим по каждой записи на курьера в таблице orders
				foreach ($orders as $order)	{																					
						$period = (DB::get_town_byId($order['town_id']))['duration_days']; 					// получаем период поездки курьера из таблицы town
						$start_date = $order['start_date'];													// получаем дату начала поездки
						$end_date = date('Y-m-d',strtotime( $start_date. "+".$period." day"));				// вычисляем конечную дату окончания поездки

						// проводим проверку случайной даты, если она попадает в период, то устанавливаем флаг записи false 
						if (($random_date >= $start_date) && ($random_date <= $end_date))	{$record = false;}	//дата неликвидна
					}	
					// 	раскомментировать, если генерация идет по количеству записей
					// 	есть разрешение на запись и число записец не достигло предела 															
					//if (($record == true) && (count ($orders) < $max_orders) ) {DB::save_order($random_town_id, $courier['id'], $random_date);};
					if (($record == true)) {DB::save_order($random_town_id, $courier['id'], $random_date);};			// есть разрешение на запись, сохраняем
					$sum = GetSumDays::get_sum($courier['id']);															// подсчёт суммы дней
					//}	while ( count ($orders) < $max_orders);				// раскомментировать, если заполнение идет по количеству записей
			}	while ( $sum < 45);											// условие прекращения генерации записей - число дней 45		
				
	}

				$data = [								
					'table_filled' => true						
				];

		$this->view->generate('fill_courier_view.php', 'template_view.php', $data);		// генерация изображения
	}
}



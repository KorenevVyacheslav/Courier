<?php

namespace App\core;

use app\models\DB;


class GetSumDays {

    public static function get_sum ($courier_id)  {                                 // функция получения суммы всех дней пути для курьера по его id
        $all_records = DB::find_courier_byId($courier_id);							// получаем все записи по курьеру по его id 
		$total = 0;                                     
        foreach ($all_records as $item)
            {
            $duration = (DB::get_town_byId($item['town_id']))['duration_days']  ;   // берем из массива запись продолжительности по id города
            $total = $total + $duration;                                            // вычисляем сумму
        }

		return $total;				
    }


}
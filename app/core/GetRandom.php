<?php

namespace App\core;

use app\models\DB;


class GetRandom  {
    public static function get_random_courier_id()  {                        
        $all_couriers = DB::get_courier_table();							// получаем записи всех курьеров
		$id_min = $all_couriers[0]['id'];								// получаем первый id 
		$id_max = $all_couriers[count($all_couriers)-1]['id'];			// получаем последний id
		$x = rand ( $id_min, $id_max );
		return (DB::get_courier_byId ($x))['id'];				// получаем случайного курьера
    }

    public static function get_first_courier_id()  {                        
        $all_couriers = DB::get_courier_table();							// получаем записи всех курьеров
		$id_min = $all_couriers[0]['id'];								// получаем первый id 
		return (DB::get_courier_byId ($id_min))['id'];				// возвращаем запись
    }

    public static function get_random_town_id()  {                        

        $all_towns = DB::get_towns_table();							// получаем записи всех курьеров
		$id_min = $all_towns[0]['id'];								// получаем первый id 
		$id_max = $all_towns[count($all_towns)-1]['id'];			// получаем последний id
		$x = rand ( $id_min, $id_max );
		return (DB::get_town_byId ($x))['id'];				// получаем случайного курьера
    }

    public static function get_random_date()  {                        

        $x = rand ( 1, 90 );            // чтобы заполнить таблицу датами за 3 месяца берем 90 дней 
		$random_date = date("Y-m-d",strtotime("+".$x." day"));
		return ($random_date);				
    }

    // public static function validate($token) {                       // метод проверки токена
    //     return isset($_SESSION['token1']) && $_SESSION['token1'] == $token;
    // }
}
<?php
namespace App\models;


use PDO;
use PDOException;

// класс - обертка для работы с БД
class DB {

	public static $dsn = 'mysql:dbname='.DB_NAME.';host='.HOST.'';
	public static $user = USER;
	public static $pass = PASSWORD;
 
	/**
	 * Объект PDO.
	 */
	public static $dbh = null;
 
	/**
	 * Statement Handle.
	 */
	public static $sth = null;
 
	/**
	 * Выполняемый SQL запрос.
	 */
	public static $query = '';
 
	/**
	 * Подключение к БД.
     * Реализуем паттерн Singleton
     * чтобы подключиться к БД только один раз
	 */
	public static function getDbh()
	{	
		if (!self::$dbh) {
			try {
				self::$dbh = new PDO(
					self::$dsn, 
					self::$user, 
					self::$pass, 
					array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
				);
				self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			} catch (PDOException $e) {
				exit('Error connecting to database: ' . $e->getMessage());
			}
		}
 
		return self::$dbh; 
	}


	// получение курьера по id. Возвращает одну запись 
	public static function get_courier_byId($id)
	{
		$query = "SELECT * FROM courier WHERE id = :id";
		self::$sth = self::getDbh()->prepare($query);
		self::$sth->execute(array('id' => $id));
		return self::$sth->fetch(PDO::FETCH_ASSOC);
	}

	// получить всех курьеров 
	public static function get_courier_table()	{
		$query = "SELECT * FROM courier";
		self::$sth = self::getDbh()->prepare($query);
		self::$sth->execute();
		return self::$sth->fetchAll(PDO::FETCH_ASSOC);		
	}

	// получить все заказы
	public static function get_orders_table()	{
		$query = "SELECT * FROM orders";
		self::$sth = self::getDbh()->prepare($query);
		self::$sth->execute();
		return self::$sth->fetchAll(PDO::FETCH_ASSOC);		
	}

	//получение города по id
	public static function get_town_byId($id)
	{
		$query = "SELECT * FROM towns WHERE id = :id";
		self::$sth = self::getDbh()->prepare($query);
        self::$sth->execute(array('id' => $id));
		return self::$sth->fetch(PDO::FETCH_ASSOC);
	}

// получить все города  
	public static function get_towns_table()	{
		$query = "SELECT * FROM towns";
		self::$sth = self::getDbh()->prepare($query);
		self::$sth->execute();
		return self::$sth->fetchAll(PDO::FETCH_ASSOC);		
	}

	public static function save_courier($name, $surname, $patronyc)
	{
        // вариант 1
//		$param = [$name, $surname, $patronyc];
//		$query = "INSERT INTO courier (`name`, `surname`, `patronyc`) VALUES (?, ?, ?)";
//		self::$sth = self::getDbh()->prepare($query);
//		return (self::$sth->execute((array) $param)) ? self::getDbh()->lastInsertId() : 0;

        $query = "INSERT INTO courier SET `name` = :name , `surname` = :surname, `patronyc` = :patronyc" ;
        self::$sth = self::getDbh()->prepare($query);
        return (self::$sth->execute(array ('name' => $name, 'surname' => $surname, 'patronyc' => $patronyc)) )? self::getDbh()->lastInsertId() : 0;
    }


	public static function save_order($town_id, $courier_id, $date)
	{
        // вариант 1
//		$param = [$town_id, $courier_id, $date];
//		$query = "INSERT INTO orders (`town_id`, `courier_id`, `start_date`) VALUES (?, ?, ?)";
//		self::$sth = self::getDbh()->prepare($query);
//		return (self::$sth->execute((array) $param)) ? self::getDbh()->lastInsertId() : 0;

        $query = "INSERT INTO orders SET `town_id` = :town_id , `courier_id` = :courier_id, `start_date` = :date" ;
        self::$sth = self::getDbh()->prepare($query);
        return (self::$sth->execute(array ('town_id' => $town_id, 'courier_id' => $courier_id, 'date' => $date)) )? self::getDbh()->lastInsertId() : 0;

	}

	//поиск всех записей по курьеру по его id в таблице orders
	public static function find_courier_byId($id)
	{
		$query = "SELECT * FROM orders WHERE courier_id = :id";
		self::$sth = self::getDbh()->prepare($query);
		self::$sth->execute(array('id' => $id));
		return self::$sth->fetchAll(PDO::FETCH_ASSOC);		
	}
	
}







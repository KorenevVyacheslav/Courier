CREATE TABLE `courier` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `patronyc` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

INSERT INTO `courier` (`name`, `surname`, `patronyc`) VALUES ('Василий', 'Васильев', 'Васильевич' );
INSERT INTO `courier` (`name`, `surname`, `patronyc`) VALUES ('Сергей', 'Сергеев', 'Сергеевич' );
INSERT INTO `courier` (`name`, `surname`, `patronyc`) VALUES ('Иван', 'Иванов', 'Иванович' );
INSERT INTO `courier` (`name`, `surname`, `patronyc`) VALUES ('Григорий', 'Григорьев', 'Григорьевич' );
INSERT INTO `courier` (`name`, `surname`, `patronyc`) VALUES ('Михаил', 'Михайлов', 'Михайлович' );
INSERT INTO `courier` (`name`, `surname`, `patronyc`) VALUES ('Евгений', 'Евгеньев', 'Евгеньевич' );
INSERT INTO `courier` (`name`, `surname`, `patronyc`) VALUES ('Александр', 'Александров', 'Александрович' );
INSERT INTO `courier` (`name`, `surname`, `patronyc`) VALUES ('Леонид', 'Леонидов', 'Леонидович' );
INSERT INTO `courier` (`name`, `surname`, `patronyc`) VALUES ('Максим', 'Максимов', 'Максимович' );
INSERT INTO `courier` (`name`, `surname`, `patronyc`) VALUES ('Денис', 'Денисов', 'Денисович' );

CREATE TABLE `towns` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `town` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `duration_days` TINYINT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

INSERT INTO `towns` (`town`, `duration_days`) VALUES ('Санкт-Петербург', 2 );
INSERT INTO `towns` (`town`, `duration_days`) VALUES ('Уфа', 4 );
INSERT INTO `towns` (`town`, `duration_days`) VALUES ('Нижний Новгород', 3 );
INSERT INTO `towns` (`town`, `duration_days`) VALUES ('Владимир', 1 );
INSERT INTO `towns` (`town`, `duration_days`) VALUES ('Кострома', 3 );
INSERT INTO `towns` (`town`, `duration_days`) VALUES ('Екатеринбург', 6 );
INSERT INTO `towns` (`town`, `duration_days`) VALUES ('Ковров', 3 );
INSERT INTO `towns` (`town`, `duration_days`) VALUES ('Воронеж', 3 );
INSERT INTO `towns` (`town`, `duration_days`) VALUES ('Самара', 4 );
INSERT INTO `towns` (`town`, `duration_days`) VALUES ('Астрахань', 2 );

 CREATE TABLE `orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
   `town_id` int unsigned NOT NULL,
   `courier_id` int unsigned NOT NULL,
   `start_date` DATE NOT NULL,
   PRIMARY KEY (`id`),
   CONSTRAINT town_fk FOREIGN KEY(town_id) REFERENCES towns(id), 
   CONSTRAINT courier_fk FOREIGN KEY(courier_id) REFERENCES courier(id)
 ) ENGINE=InnoDB AUTO_INCREMENT=1;




CREATE TABLE courier (
  id SERIAL PRIMARY KEY NOT NULL,
  name varchar(191) NOT NULL,
  surname varchar(191) NOT NULL,
  patronyc varchar(191) NOT NULL);

INSERT INTO courier (name, surname, patronyc) VALUES ('Василий', 'Васильев', 'Васильевич' );
INSERT INTO courier (name, surname, patronyc) VALUES ('Сергей', 'Сергеев', 'Сергеевич' );
INSERT INTO courier (name, surname, patronyc) VALUES ('Иван', 'Иванов', 'Иванович' );
INSERT INTO courier (name, surname, patronyc) VALUES ('Григорий', 'Григорьев', 'Григорьевич' );
INSERT INTO courier (name, surname, patronyc) VALUES ('Михаил', 'Михайлов', 'Михайлович' );
INSERT INTO courier (name, surname, patronyc) VALUES ('Евгений', 'Евгеньев', 'Евгеньевич' );
INSERT INTO courier (name, surname, patronyc) VALUES ('Александр', 'Александров', 'Александрович' );
INSERT INTO courier (name, surname, patronyc) VALUES ('Леонид', 'Леонидов', 'Леонидович' );
INSERT INTO courier (name, surname, patronyc) VALUES ('Максим', 'Максимов', 'Максимович' );
INSERT INTO courier (name, surname, patronyc) VALUES ('Денис', 'Денисов', 'Денисович' );

CREATE TABLE towns (
  id SERIAL PRIMARY KEY NOT NULL,
  town varchar(191) NOT NULL,
  duration_days SMALLINT NOT NULL);

INSERT INTO towns (town, duration_days) VALUES ('Санкт-Петербург', 2 );
INSERT INTO towns (town, duration_days) VALUES ('Уфа', 4 );
INSERT INTO towns (town, duration_days) VALUES ('Нижний Новгород', 3 );
INSERT INTO towns (town, duration_days) VALUES ('Владимир', 1 );
INSERT INTO towns (town, duration_days) VALUES ('Кострома', 3 );
INSERT INTO towns (town, duration_days) VALUES ('Екатеринбург', 6 );
INSERT INTO towns (town, duration_days) VALUES ('Ковров', 3 );
INSERT INTO towns (town, duration_days) VALUES ('Воронеж', 3 );
INSERT INTO towns (town, duration_days) VALUES ('Самара', 4 );
INSERT INTO towns (town, duration_days) VALUES ('Астрахань', 2 );

 CREATE TABLE orders (
  id SERIAL PRIMARY KEY NOT NULL,
  town_id INTEGER NOT NULL CHECK (town_id >= 0),
  courier_id INTEGER NOT NULL CHECK (courier_id >= 0),
  start_date DATE NOT NULL,
   CONSTRAINT town_fk FOREIGN KEY(town_id) REFERENCES towns(id),
   CONSTRAINT courier_fk FOREIGN KEY(courier_id) REFERENCES courier(id)
 );




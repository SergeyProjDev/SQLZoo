INSERT INTO post VALUES 
	(1, 'Ветеринар'),
	(2, 'Уборщик'),
	(3, 'Дрессировщик'),
	(4, 'Строитель-ремонтник'),
	(5, 'Администратор');
	
	
	
INSERT INTO employee VALUES 
	(NULL, 'Жиренков Евграф Филиппович',     1, 7000,  '2012-03-12', '1988-09-19', 'м', 1),
	(NULL, 'Мандрыка Нина Елизаровна',       3, 13000, '2011-08-01', '1972-03-12', 'ж', 6),
	(NULL, 'Кривкова Ольга Семеновна',       4, 15000, '2018-09-09', '1990-07-12', 'ж', 0),
	(NULL, 'Чесноков Эрнст Измаилович',      5, 25000, '2010-07-12', '1971-07-27', 'м', 0),
	(NULL, 'Ревякин Виктор Арсениевич',      3, 11900, '2008-03-09', '1951-03-01', 'м', 17),
	(NULL, 'Гольца Оксана Михеевна',         2, 3600,  '2011-07-27', '1995-08-17', 'ж', 0),
	(NULL, 'Алиева Зоя Елисеевна',           3, 11000, '2015-08-17', '1989-09-21', 'ж', 3),
	(NULL, 'Ромазан Руслан Никонович',       2, 3600,  '2016-07-19', '1978-07-31', 'м', 0),
	(NULL, 'Счастливцева Лариса Леонидовна', 1, 10000, '2018-07-31', '1989-01-01', 'ж', 2),
	(NULL, 'Лелуха Алиса Владиленовна',      3, 10000, '2013-01-30', '1975-03-09', 'ж', 7),
	(NULL, 'Захарьина Изольда Станиславовна',4, 15000, '2008-07-11', '1970-07-12', 'ж', 22),
	(NULL, 'Сиваков Родион Мечиславович',    5, 25000, '2007-08-01', '1970-07-30', 'м', 0),
	(NULL, 'Панфилова Анисья Ивановна',      1, 20000, '2011-03-01', '1981-03-01', 'ж', 12),
	(NULL, 'Пронин Онуфрий Денисович',       2, 3600,  '2015-03-09', '1985-08-17', 'м', 0),
	(NULL, 'Заславский Афанасий Захарович',  1, 7000,  '2018-02-17', '1959-09-21', 'м', 41),
	(NULL, 'Унтилова Рада Иларионовна',      1, 10000, '2015-07-14', '1968-07-31', 'ж', 14),
	(NULL, 'Косма Онуфрий Святославович',    1, 8000,  '2008-07-25', '1978-09-09', 'м', 0),
	(NULL, 'Горева Жанна Казимировна',       2, 3600,  '2009-09-21', '1975-03-09', 'ж', 9),
	(NULL, 'Островерха Марфа Ивановна',      4, 15000, '2010-07-30', '1980-07-12', 'ж', 0),
	(NULL, 'Козлаков Юлиан Леонтиевич',      4, 15000, '2015-06-10', '1990-07-30', 'м', 3);	
	
	
	
INSERT INTO animal_class VALUES
	(1, 'Рыбы'),
	(2, 'Земноводные'),
	(3, 'Птицы'),
	(4, 'Рептилии '),
	(5, 'Млекопитающие');
	
INSERT INTO cage VALUES 
	(1, 'Теплая клетка'),
	(2, 'Летняя клетка'),
	(3, 'Теплый бассейн'),
	(4, 'Летний бассейн'),
	(5, 'Аквариум'),
	(6, 'Террариум');

INSERT INTO zoos VALUES 
	(1, 'Этот зоопарк'),
	(2, 'Винницкий зоопарк'),
	(3, 'Докучаевский зоопарк'),
	(4, 'Киевский зоопарк'),
	(5, 'Луцкий зоопарк'),
	(6, 'Николаевский зоопарк'),
	(7, 'Одесский зоопарк'),
	(8, 'Ровенский зоопарк'),
	(9, 'Аскания-Нова (заповедник)'),
	(10, 'Донецкий дельфинарий'),
	(11, 'Карадагский дельфинарий'),
	(12, 'Одесский дельфинарий'),
	(13, 'Харьковский дельфинарий');
	
	
	
INSERT INTO animal VALUES									
    (NULL, 'Тигр Белый',          'Факер',   'м', 62,   181,  false, true,  '2001-04-05', 2,  5,  1,  '2001-04-05'),
	(NULL, 'Чихуахуа',            'Вася',    'м', 1.5,  21,   true,  false, '2014-07-21', 1,  5,  4,  '2015-09-09'),	
	(NULL, 'Лягушка бесхвостая',  'Фишка',   'ж', 0.2,  13.5, false, false, '2018-06-01', 6,  4,  1,  '2018-06-01'),
	(NULL, 'Жаба морская',        'Сноу',    'ж', 0.3,  12.9, false, false, '2009-12-31', 6,  1,  7,  '2010-01-01'),
	(NULL, 'Шиншила',             'Кэвин',   'м', 2.1,  32,   true,  false, '2016-08-11', 1,  5,  1,  '2016-08-11'),
	(NULL, 'Той бобтейл',         'Йалда',   'ж', 2.3,  27,   true,  false, '2012-12-21', 2,  5,  9,  '2013-09-17'),
	(NULL, 'Крестовый барбуз',    'Палтус',  'м', 0.65, 7,    false, false, '2008-11-07', 5,  1,  1,  '2008-11-07'),
	(NULL, 'Спинорог Пикассо',    'Дорече',  'м', 0.53, 21,   false, false, '2016-02-08', 5,  1,  11, '2018-09-09'),
	(NULL, 'Обыкновенная игрунка','Декстер', 'м', 12,   78,   true,  true,  '2000-06-01', 3,  5,  1,  '2000-06-01'),
	(NULL, 'Индийский палочник',  'Астерикс','м', 4.2,  97,   false, false, '2011-10-23', 1,  3,  1,  '2011-10-23');



INSERT INTO physiology VALUES									
    (NULL, 62,   181, '2001-04-05'),
	(NULL, 1.5,  21,  '2015-09-09'),	
	(NULL, 0.2,  13.5,'2018-06-01'),
	(NULL, 0.3,  12.9,'2010-01-01'),
	(NULL, 2.1,  32,  '2016-08-11'),
	(NULL, 2.3,  27,  '2013-09-17'),
	(NULL, 0.65, 7,   '2008-11-07'),
	(NULL, 0.53, 21,  '2018-09-09'),
	(NULL, 12,   78,  '2000-06-01'),
	(NULL, 4.2,  97,  '2011-10-23');
	
	
	
INSERT INTO season VALUES 
	(1, 'Зима'),
	(2, 'Весна'),
	(3, 'Лето'),
	(4, 'Осень');



INSERT INTO animal_employee VALUES
	(1, 1, '2016-05-01', NULL),
	(1, 2, '2012-10-11', '2017-07-21'),
	(2, 7, '2017-01-01', NULL),
	(2, 9, '2017-01-01', NULL),
	(3, 5, '2016-05-21', NULL),
	(4, 9, '2016-05-04', NULL),
	(5, 9, '2018-01-11', NULL),
	(6, 9, '2016-02-01', NULL),
	(7, 7, '2018-11-05', NULL),
	(8, 5, '2016-04-08', NULL),
	(8, 10, '2017-08-15', '2018-07-05'),
	(9, 13, '2018-05-01', NULL),
	(10, 13,'2018-12-23', NULL);



INSERT INTO vaccination VALUES
	(1, 'Энгимицин 10%', '2016-09-07'),
	(1, 'Мометамакс', '2017-01-24'),
	(3, 'Плерион', '2016-12-14'),
	(4, 'Оптиммун', '2018-06-09'),
	(2, 'Дексафорт', '2015-11-15');
	
INSERT INTO illness VALUES 
	(1, 2, NULL, 'отказ от еды, плохой аппетит, потеря веса', 'лактовит или йогурт принимаются трижды в день', '2016-12-08', NULL),
	(2, 6, NULL, 'диарея, рвота', 'строгая диета', '2016-12-08', NULL),
	(1, 8, NULL, 'повышенная температура', 'противовирусные', '2016-12-08', NULL),
	(5, 7, NULL, 'хламидиоз', 'фромилид три иньекции', '2016-12-08', NULL),
	(3, 2, NULL, 'диарея, рвота', 'диета и гипотопротекторы', '2016-12-08', NULL);
	
	
INSERT INTO food_seller VALUES 
	(1, 'Корма ТМ',      '7203370', 'г. Мариинский Посад, ул. Железнодорожников, дом 58'),
	(2, 'Все для скота', '7904367', 'г. Аргун, ул. Журавлёва, дом 8'),
	(3, 'Сытый конь',    '7123467', 'г. Сычевка, ул. Барболина, дом 43, квартира 100'),
	(4, 'Овес на вес',   '9402168', 'г. Красная Горка, ул. 15 лет октября, дом 95'),
	(5, 'Кормикус',      '7254247', 'г. Онега, ул. Вагонников 2-я, дом 27, квартира 144');

	
	
	
	
	

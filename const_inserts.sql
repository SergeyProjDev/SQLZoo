INSERT INTO post VALUES 
	(1, 'Ветеринар'),
	(2, 'Уборщик'),
	(3, 'Дрессировщик'),
	(4, 'Строитель-ремонтник'),
	(5, 'Администратор');
	
INSERT INTO cage VALUES 
	(1, 'Теплая клетка'),
	(2, 'Летняя клетка'),
	(3, 'Теплый бассейн'),
	(4, 'Летний бассейн'),
	(5, 'Аквариум'),
	(6, 'Террариум');
	
INSERT INTO food_class VALUES 
	(1, 'Растительный'),
	(2, 'Живой'),
	(3, 'Мясо'),
	(4, 'Комбикорм');
	
INSERT INTO season VALUES 
	(1, 'Зима'),
	(2, 'Весна'),
	(3, 'Лето'),
	(4, 'Осень');
	
INSERT INTO zoos VALUES 
	(1, 'Этот зоопарк');
	
INSERT INTO animal_class VALUES
	(1, 'Рыбы'),
	(2, 'Земноводные'),
	(3, 'Птицы'),
	(4, 'Рептилии '),
	(5, 'Млекопитающие');
	
	
	
	
	
	
	
	
	
	
	
	
	
INSERT INTO employee VALUES 
	(NULL, 'Жиренков Евграф Филиппович',     1, 7000,  '2012-03-12', '1988-09-19', 'м'),
	(NULL, 'Мандрыка Нина Елизаровна',       3, 13000, '2011-08-01', '1972-03-12', 'ж'),
	(NULL, 'Кривкова Ольга Семеновна',       4, 15000, '2018-09-09', '1990-07-12', 'ж'),
	(NULL, 'Чесноков Эрнст Измаилович',      5, 25000, '2010-07-12', '1971-07-27', 'м'),
	(NULL, 'Ревякин Виктор Арсениевич',      3, 11900, '2008-03-09', '1951-03-01', 'м'),
	(NULL, 'Гольца Оксана Михеевна',         2, 3600,  '2011-07-27', '1995-08-17', 'ж'),
	(NULL, 'Алиева Зоя Елисеевна',           3, 11000, '2015-08-17', '1989-09-21', 'ж'),
	(NULL, 'Ромазан Руслан Никонович',       2, 3600,  '2016-07-19', '1978-07-31', 'м'),
	(NULL, 'Счастливцева Лариса Леонидовна', 1, 10000, '2018-07-31', '1989-01-01', 'ж'),
	(NULL, 'Лелуха Алиса Владиленовна',      3, 10000, '2013-01-30', '1975-03-09', 'ж'),
	(NULL, 'Захарьина Изольда Станиславовна',4, 15000, '2008-07-11', '1970-07-12', 'ж'),
	(NULL, 'Сиваков Родион Мечиславович',    5, 25000, '2007-08-01', '1970-07-30', 'м'),
	(NULL, 'Панфилова Анисья Ивановна',      1, 20000, '2011-03-01', '1981-03-01', 'ж'),
	(NULL, 'Пронин Онуфрий Денисович',       2, 3600,  '2015-03-09', '1985-08-17', 'м'),
	(NULL, 'Заславский Афанасий Захарович',  1, 7000,  '2018-02-17', '1959-09-21', 'м'),
	(NULL, 'Унтилова Рада Иларионовна',      1, 10000, '2015-07-14', '1968-07-31', 'ж'),
	(NULL, 'Косма Онуфрий Святославович',    1, 8000,  '2008-07-25', '1978-09-09', 'м'),
	(NULL, 'Горева Жанна Казимировна',       2, 3600,  '2009-09-21', '1975-03-09', 'ж'),
	(NULL, 'Островерха Марфа Ивановна',      4, 15000, '2010-07-30', '1980-07-12', 'ж'),
	(NULL, 'Козлаков Юлиан Леонтиевич',      4, 15000, '2015-06-10', '1990-07-30', 'м');
	
INSERT INTO animal VALUES 
	(NULL, 'Сокровище'	, 1, 5, 'т', 'ж', 2, 0.8, 'т', '2005-08-17', 1, NULL, NULL, NULL),
	(NULL, 'Нука'    	, 3, 2, 'х', 'ж', 28, 85, 'т', '2005-08-17', 1, NULL, NULL, NULL),
	(NULL, 'Хадосик'	, 6, 4, 'т', 'м', 38, 85, 'т', '2005-08-17', 1, NULL, NULL, NULL),
	(NULL, 'Дзиро'		, 2, 5, 'т', 'м', 65, 85, 'т', '2005-08-17', 1, NULL, NULL, NULL),
	(NULL, 'Нати'		, 2, 3, 'х', 'ж', 28, 85, 'т', '2006-08-17', 1, NULL, NULL, NULL),
	(NULL, 'Цапа'		, 1, 2, 'х', 'ж', 28, 85, 'т', '2005-08-17', 1, NULL, NULL, NULL),
	(NULL, 'Жокса'		, 4, 1, 'т', 'м', 28, 85, 'т', '2005-08-17', 1, NULL, NULL, NULL),
	(NULL, 'Кутик'		, 2, 3, 'х', 'м', 28, 85, 'т', '2005-08-17', 1, NULL, NULL, NULL),
	(NULL, 'Муркон'		, 1, 5, 'т', 'м', 28, 85, 'т', '2005-08-17', 1, NULL, NULL, NULL),
	(NULL, 'Мажужа'		, 1, 1, 'т', 'ж', 28, 85, 'т', '2005-08-17', 1, NULL, NULL, NULL),
	(NULL, 'Зефирка'	, 2, 2, 'х', 'м', 28, 85, 'т', '2005-08-17', 1, NULL, NULL, NULL),
	(NULL, 'Адольф'		, 1, 2, 'х', 'м', 28, 85, 'т', '2005-08-17', 1, NULL, NULL, NULL),
	(NULL, 'Кушик'		, 2, 5, 'т', 'м', 28, 85, 'т', '2005-08-17', 1, NULL, NULL, NULL),
	(NULL, 'Амиго'		, 6, 4, 'т', 'м', 28, 85, 'т', '2005-08-17', 1, NULL, NULL, NULL),
	(NULL, 'Африк'		, 2, 5, 'т', 'м', 28, 85, 'т', '2005-08-17', 1, NULL, NULL, NULL),
	(NULL, 'Хелен'		, 4, 1, 'т', 'ж', 28, 85, 'т', '2005-08-17', 1, NULL, NULL, NULL),
	(NULL, 'Бэйпинг'	, 2, 2, 'х', 'м', 28, 85, 'т', '2005-08-17', 1, NULL, NULL, NULL),
	(NULL, 'Пампа'		, 2, 3, 'х', 'ж', 28, 85, 'т', '2005-08-17', 1, NULL, NULL, NULL),
	(NULL, 'Селикс'		, 1, 2, 'х', 'м', 28, 85, 'т', '2005-08-17', 1, NULL, NULL, NULL),
	(NULL, 'Спайди'		, 6, 4, 'т', 'м', 28, 85, 'т', '2005-08-17', 1, NULL, NULL, NULL);
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

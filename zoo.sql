DROP DATABASE if EXISTS zoo;
CREATE DATABASE zoo CHARACTER SET utf8 COLLATE utf8_bin;
USE zoo;


/*1 должности сотрудников*/ 
CREATE TABLE post
( 
	id_post      INT AUTO_INCREMENT PRIMARY KEY,
	post_name    VARCHAR(30) NOT NULL
);

/*2 клетки для животных*/ 
CREATE TABLE cage
(  
	id_cage       INT AUTO_INCREMENT PRIMARY KEY,
	cage_type     VARCHAR(30) NOT NULL
);

/*3 классы животных (const)*/
CREATE TABLE animal_class
(  
	id_animal_class    INT AUTO_INCREMENT PRIMARY KEY,
	animal_class_name  VARCHAR(50) NOT NULL
);

/*4 зоопарки*/
CREATE TABLE zoos
(  
	id_zoo           INT AUTO_INCREMENT PRIMARY KEY,
	zoo_name		 VARCHAR(255) NOT NULL
);

/*5 сотрудник*/
CREATE TABLE employee  
(  
	id_employee   INT AUTO_INCREMENT PRIMARY KEY,
	name          VARCHAR(60) NOT NULL,
	id_post       INT NOT NULL,
	salary        INT NOT NULL,
	started_work  DATE NOT NULL,
	birth         DATE,
	sex           VARCHAR(1) NOT NULL,
	experience    INT,
		FOREIGN KEY (id_post) REFERENCES post (id_post)
);

/*6 животное*/ 
CREATE TABLE animal 
( 
	id_animal       INT AUTO_INCREMENT PRIMARY KEY,
	title			VARCHAR(60) NOT NULL,
	name            VARCHAR(20) NOT NULL,	
	sex             CHAR NOT NULL,
	weight          FLOAT NOT NULL,
	height          FLOAT NOT NULL,
	need_warm       BOOLEAN NOT NULL,
	predator        BOOLEAN NOT NULL,
	birth_date      DATE NOT NULL,
	id_cage         INT NOT NULL,
	id_animal_class INT NOT NULL,
	id_birth_place  INT NOT NULL,
	arrived_date    DATE NOT NULL,
		FOREIGN KEY (id_birth_place) REFERENCES zoos (id_zoo),
		FOREIGN KEY (id_animal_class) REFERENCES animal_class (id_animal_class)
);

/*дети*/
CREATE TABLE relations(
	id_parent      INT NOT NULL,
	id_child       INT NOT NULL
);

CREATE TABLE physiology(
	id_animal      INT NOT NULL,
	weight         FLOAT NOT NULL,
	height         FLOAT NOT NULL,
	check_date     DATE NOT NULL,
		FOREIGN KEY (id_animal) REFERENCES animal(id_animal) ON DELETE CASCADE
);

/*8 струдники, ухаживающие за животным*/ 
CREATE TABLE animal_employee 
(  
	id_animal        INT NOT NULL,
	id_employee      INT NOT NULL,
	date_starts      DATE NOT NULL,
	date_ends        DATE,
		FOREIGN KEY (id_animal) REFERENCES animal(id_animal) ON DELETE CASCADE,
		FOREIGN KEY (id_employee) REFERENCES employee(id_employee) ON DELETE CASCADE
);

/*9 больезнь животного*/
CREATE TABLE illness
(   
	id_animal       INT NOT NULL,
	id_employee     INT NOT NULL,
	id_illness      INT AUTO_INCREMENT PRIMARY KEY,
	diagnosis       VARCHAR(100) NOT NULL,
	need            VARCHAR(100) NOT NULL,
	illness_starts  DATE NOT NULL,
	illness_ends    DATE,
		FOREIGN KEY (id_animal) REFERENCES animal (id_animal) ON DELETE CASCADE,
		FOREIGN KEY (id_employee) REFERENCES employee (id_employee) ON UPDATE CASCADE
);

/*11 вакцинация животного*/ 
CREATE TABLE vaccination
(  
	id_animal      INT NOT NULL,
	vac_name       VARCHAR(30) NOT NULL,
	vac_date       DATE NOT NULL,
		FOREIGN KEY (id_animal) REFERENCES animal (id_animal) ON DELETE CASCADE
);

/*12 мертвое животное*/
CREATE TABLE gone_animal 
( 
	id_animal       INT PRIMARY KEY,
	title			VARCHAR(60) NOT NULL,
	name            VARCHAR(20) NOT NULL,	
	sex             CHAR NOT NULL,
	weight          FLOAT NOT NULL,
	height          FLOAT NOT NULL,
	id_animal_class INT NOT NULL,
	birth_date      DATE NOT NULL,
	gone_date       DATE NOT NULL,
	vaccins         TEXT,
	ills            TEXT,
	id_gone_place   INT,
	dead            BOOLEAN,
		FOREIGN KEY (id_animal_class) REFERENCES animal_class (id_animal_class) ON UPDATE CASCADE,
		FOREIGN KEY (id_gone_place) REFERENCES zoos (id_zoo) ON UPDATE CASCADE
);

/*13 сезон года*/ 
CREATE TABLE season
(  
	id_season    INT AUTO_INCREMENT PRIMARY KEY,
	season_name  VARCHAR(5) NOT NULL
);

/*14 продавцы еды*/
CREATE TABLE food_seller
(   
	id_seller     INT AUTO_INCREMENT PRIMARY KEY,
	seller_name   VARCHAR(60) NOT NULL,
	phone         VARCHAR(20) NOT NULL,
	address       VARCHAR(80) NOT NULL
);

/*15 еда-сезон*/
CREATE TABLE food 
(  
	id_food       INT AUTO_INCREMENT PRIMARY KEY,
	id_season     INT NOT NULL,
	food_title    VARCHAR(30) NOT NULL,
	measure       VARCHAR(10) NOT NULL,
		FOREIGN KEY (id_season) REFERENCES season(id_season)
);

/*16 покупока еды*/ 
CREATE TABLE food_bought
(  
	id_seller     INT NOT NULL,
	id_food       INT NOT NULL,
	buy_date      DATE NOT NULL,
	amount        DECIMAL NOT NULL,
	price_per_ed  INT NOT NULL,
	id_animal     INT NOT NULL,
		FOREIGN KEY (id_seller) REFERENCES food_seller (id_seller),
		FOREIGN KEY (id_food) REFERENCES food (id_food),
		FOREIGN KEY (id_animal) REFERENCES animal (id_animal)
);
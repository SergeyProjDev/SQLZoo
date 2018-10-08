DROP DATABASE if EXISTS zoo;
CREATE DATABASE zoo CHARACTER SET utf8 COLLATE utf8_bin;
USE zoo;


CREATE TABLE post
(  /*+должности сотрудников (const)*/ 
	id_post      INT AUTO_INCREMENT PRIMARY KEY,
	post_name    VARCHAR(100) NOT NULL
);

CREATE TABLE season
(  /*+сезон года (const)*/ 
	id_season    INT AUTO_INCREMENT PRIMARY KEY,
	season_name  VARCHAR(30) NOT NULL
);

CREATE TABLE cage
(  /*+клетки для животных (const)*/ 
	id_cage       INT AUTO_INCREMENT PRIMARY KEY,
	cage_type     VARCHAR(30) NOT NULL
);

CREATE TABLE animal_class
(
	id_animal_class    INT AUTO_INCREMENT PRIMARY KEY,
	animal_class_name  VARCHAR(50) NOT NULL
);

CREATE TABLE food_class
(  /*+классы еды для животных (const)*/ 
	id_food_class   INT AUTO_INCREMENT PRIMARY KEY,
	food_class_name VARCHAR(30) NOT NULL
);
CREATE TABLE food 
(  /*+еда из класса*/
	id_food       INT AUTO_INCREMENT PRIMARY KEY,
	id_food_class INT NOT NULL,
	food_name     VARCHAR(50) NOT NULL,
		FOREIGN KEY (id_food) REFERENCES food_class (id_food_class)
		
);
CREATE TABLE food_seller
(  /*+продавцы еды*/ 
	id_seller     INT AUTO_INCREMENT PRIMARY KEY,
	seller_name   VARCHAR(30) NOT NULL
);
CREATE TABLE food_bought
(  /*таблица истории покупок*/ 
	id_seller     INT NOT NULL,
	id_food       INT NOT NULL,
	date_came     VARCHAR(30) NOT NULL,
	weight        INT NOT NULL,
	price_per_kg  INT NOT NULL,
		FOREIGN KEY (id_seller) REFERENCES food_seller (id_seller),
		FOREIGN KEY (id_food) REFERENCES food (id_food)
);







CREATE TABLE employee  
(  /*+сотрудник*/
	id_employee   INT AUTO_INCREMENT PRIMARY KEY,
	name          VARCHAR(255) NOT NULL,
	id_post       INT NOT NULL,
	salary        INT NOT NULL,
	started_work  DATE NOT NULL,
	birth         DATE NOT NULL,
	sex           VARCHAR(1) NOT NULL,
		FOREIGN KEY (id_post) REFERENCES post (id_post)
);






CREATE TABLE zoos
(  /*+зоопарки*/
	id_zoo           INT AUTO_INCREMENT PRIMARY KEY,
	zoo_name		 VARCHAR(255) NOT NULL
);


CREATE TABLE animal 
(  /*+животное*/ 
	id_animal       INT AUTO_INCREMENT PRIMARY KEY,
	name            VARCHAR(30) NOT NULL,
	id_cage         INT NOT NULL,
	id_animal_class INT NOT NULL,
	predator        CHAR NOT NULL,
	sex             CHAR NOT NULL,
	weight          DECIMAL NOT NULL,
	height          DECIMAL NOT NULL,
	need_warm       CHAR NOT NULL,
	birth_date      VARCHAR(30) NOT NULL,
	id_birth_place  INT NOT NULL,
	id_gone_place   INT,
	arrived_date    VARCHAR(30),
	gone_date       VARCHAR(30),
		FOREIGN KEY (id_birth_place) REFERENCES zoos (id_zoo),
		FOREIGN KEY (id_gone_place) REFERENCES zoos (id_zoo),
		FOREIGN KEY (id_animal_class) REFERENCES animal_class (id_animal_class)
);



CREATE TABLE animal_cage 
(  /*+клетка животного*/ 
	id_animal     INT NOT NULL,
	id_cage       INT NOT NULL,
	come_date     VARCHAR(30) NOT NULL, 
	gone_date     VARCHAR(30),
		FOREIGN KEY (id_cage) REFERENCES cage (id_cage) ON UPDATE CASCADE,
		FOREIGN KEY (id_animal) REFERENCES animal (id_animal) ON DELETE CASCADE
);


CREATE TABLE vaccination
(  /*+вакцинация животного*/ 
	id_animal      INT NOT NULL,
	vaccination    VARCHAR(30) NOT NULL,
		FOREIGN KEY (id_animal) REFERENCES animal (id_animal) ON DELETE CASCADE
);


CREATE TABLE animal_food 
(  /*+еда животного*/ 
	id_animal      INT NOT NULL,
	id_season      INT NOT NULL,
		FOREIGN KEY (id_animal) REFERENCES  animal (id_animal) ON DELETE CASCADE,
		FOREIGN KEY (id_season) REFERENCES season (id_season) ON UPDATE CASCADE
);


CREATE TABLE illness
(  /*+больезнь животного*/ 
	id_animal       INT NOT NULL,
	illness_name    VARCHAR(50) NOT NULL,
	illness_starts  VARCHAR(50) NOT NULL,
	illness_ends    VARCHAR(50),
		FOREIGN KEY (id_animal) REFERENCES animal (id_animal) ON DELETE CASCADE
);


CREATE TABLE child
(   /*+потомство животного*/ 
	id_animal       INT NOT NULL,
	id_child        INT NOT NULL,
		FOREIGN KEY (id_animal) REFERENCES animal (id_animal) ON DELETE CASCADE, 
		FOREIGN KEY (id_child) REFERENCES animal (id_animal) ON DELETE CASCADE
);


CREATE TABLE animal_employee 
(  /*+струдники, ухаживающие за животным*/ 
	id_animal        INT NOT NULL,
	id_employee      INT NOT NULL,
	date_starts      VARCHAR(30) NOT NULL,
	date_ends        VARCHAR(30),
		FOREIGN KEY (id_animal) REFERENCES animal(id_animal) ON DELETE CASCADE,
		FOREIGN KEY (id_employee) REFERENCES employee(id_employee) ON DELETE CASCADE
);
















